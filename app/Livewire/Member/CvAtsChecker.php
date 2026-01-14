<?php

declare(strict_types=1);

namespace App\Livewire\Member;

use App\Services\GeminiService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Smalot\PdfParser\Parser;

#[Title('CV ATS Checker - Dirtech')]
final class CvAtsChecker extends Component
{
    use WithFileUploads;

    public $cvFile;
    public string $jobDescription = '';
    public bool $isAnalyzing = false;
    public ?array $analysisResult = null;
    public ?string $errorMessage = null;

    /**
     * Rules for validation.
     */
    protected function rules(): array
    {
        return [
            'cvFile' => 'required|file|mimes:pdf,docx|max:2048',
            'jobDescription' => 'required|string|min:50',
        ];
    }

    /**
     * Analyze the CV against the JD.
     */
    public function analyze(): void
    {
        $this->validate();
        $this->isAnalyzing = true;
        $this->errorMessage = null;
        $this->analysisResult = null;

        try {
            $cvText = $this->extractText();
            
            if (empty(trim($cvText))) {
                throw new \Exception('Gagal mengekstrak teks dari CV. Pastikan file tidak kosong atau terenkripsi.');
            }

            $gemini = app(\App\Contracts\AiServiceInterface::class);
            $result = $gemini->analyzeCvAts($cvText, $this->jobDescription);

            if ($result['success']) {
                $this->analysisResult = $result['analysis'];
            } else {
                $this->errorMessage = $result['error'];
            }
        } catch (\Exception $e) {
            Log::error('ATS Checker Error', ['message' => $e->getMessage()]);
            $this->errorMessage = 'Terjadi kesalahan: ' . $e->getMessage();
        } finally {
            $this->isAnalyzing = false;
        }
    }

    /**
     * Extract text from the uploaded file.
     */
    private function extractText(): string
    {
        $path = $this->cvFile->getRealPath();
        $extension = $this->cvFile->getClientOriginalExtension();

        if ($extension === 'pdf') {
            $parser = new Parser();
            $pdf = $parser->parseFile($path);
            return $pdf->getText();
        }

        if ($extension === 'docx') {
            return $this->extractDocxText($path);
        }

        return '';
    }

    /**
     * Extract text from DOCX.
     */
    private function extractDocxText(string $path): string
    {
        $content = '';
        $zip = new \ZipArchive();
        if ($zip->open($path) === true) {
            if (($index = $zip->locateName('word/document.xml')) !== false) {
                $data = $zip->getFromIndex($index);
                $content = strip_tags($data);
            }
            $zip->close();
        }
        return $content;
    }

    /**
     * Reset the form.
     */
    public function resetForm(): void
    {
        $this->reset(['cvFile', 'jobDescription', 'analysisResult', 'errorMessage']);
    }

    /**
     * Render the component view.
     */
    public function render(): View
    {
        return view('livewire.member.cv-ats-checker')->layout('components.layouts.member');
    }
}
