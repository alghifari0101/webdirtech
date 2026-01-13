<?php

declare(strict_types=1);

namespace App\Livewire\Member;

use App\Models\CvData;
use App\Actions\Member\Cv\SaveCvDataAction;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

/**
 * CV Editor component.
 */
final class CvEditor extends Component
{
    use WithFileUploads;

    public mixed $photo = null;
    public int $step = 1;

    public array $data = [
        'full_name' => '',
        'email' => '',
        'phone' => '',
        'location' => '',
        'linkedin' => '',
        'website' => '',
        'photo_path' => null,
        'summary' => '',
        'experience' => [],
        'organizations' => [],
        'education' => [],
        'skills' => [],
        'projects' => [],
        'languages' => [],
        'template' => 'basic',
        'language' => 'id',
    ];

    public function mount(): void
    {
        \Illuminate\Support\Facades\Gate::authorize('member');
        
        $cv = CvData::where('user_id', auth()->id())->first();
        if ($cv) {
            $this->data = $cv->toArray();
            
            // Normalize legacy template names
            $replacements = [
                'premium_ats' => 'template_001',
                'modern_soft' => 'template_002',
                'professional_academic' => 'template_003',
            ];
            
            if (isset($replacements[$this->data['template']])) {
                $this->data['template'] = $replacements[$this->data['template']];
            }
        } else {
            // Default initial data if needed
            $this->data['email'] = auth()->user()->email;
            $this->data['full_name'] = auth()->user()->name;
        }
    }

    public function save(SaveCvDataAction $action): void
    {
        \Illuminate\Support\Facades\Gate::authorize('member');

        $this->data['full_name'] = trim($this->data['full_name']);

        // Final normalization before validation
        $replacements = [
            'premium_ats' => 'template_001',
            'modern_soft' => 'template_002',
            'professional_academic' => 'template_003',
        ];

        if (isset($replacements[$this->data['template']])) {
            $this->data['template'] = $replacements[$this->data['template']];
        }
        
        $this->validate([
            'data.full_name' => 'required|min:3',
            'data.email' => 'required|email',
            'data.linkedin' => 'nullable|string',
            'data.website' => 'nullable|string',
            'data.template' => 'required|in:basic,modern,elegant,creative,template_001,template_002,template_003,template_004,template_005,template_006,template_007',
            'photo' => 'nullable|image|max:1024', // Max 1MB
        ]);

        if ($this->photo) {
            $this->data['photo_path'] = $this->photo->store('cv-photos', 'public');
        }

        $action->execute((int) auth()->id(), $this->data);

        session()->flash('message', 'Data CV berhasil disimpan.');
    }

    public function addExperience(): void
    {
        $this->data['experience'][] = ['company' => '', 'position' => '', 'period' => '', 'location' => '', 'description' => ''];
    }

    public function removeExperience(int $index): void
    {
        unset($this->data['experience'][$index]);
        $this->data['experience'] = array_values($this->data['experience']);
    }

    public function addOrganization(): void
    {
        $this->data['organizations'][] = ['name' => '', 'position' => '', 'period' => '', 'location' => '', 'description' => ''];
    }

    public function removeOrganization(int $index): void
    {
        unset($this->data['organizations'][$index]);
        $this->data['organizations'] = array_values($this->data['organizations']);
    }

    public function addEducation(): void
    {
        $this->data['education'][] = ['school' => '', 'degree' => '', 'period' => '', 'location' => '', 'description' => ''];
    }

    public function removeEducation(int $index): void
    {
        unset($this->data['education'][$index]);
        $this->data['education'] = array_values($this->data['education']);
    }

    public function addSkill(): void
    {
        $this->data['skills'][] = '';
    }

    public function removeSkill(int $index): void
    {
        unset($this->data['skills'][$index]);
        $this->data['skills'] = array_values($this->data['skills']);
    }

    public function addProject(): void
    {
        $this->data['projects'][] = ['name' => '', 'period' => '', 'link' => '', 'description' => ''];
    }

    public function removeProject(int $index): void
    {
        unset($this->data['projects'][$index]);
        $this->data['projects'] = array_values($this->data['projects']);
    }

    public function addLanguage(): void
    {
        $this->data['languages'][] = ['name' => '', 'level' => ''];
    }

    public function removeLanguage(int $index): void
    {
        unset($this->data['languages'][$index]);
        $this->data['languages'] = array_values($this->data['languages']);
    }

    public function setStep(int $step): void
    {
        $this->step = $step;
        $this->dispatch('step-changed', step: $step);
    }

    public function nextStep(): void
    {
        if ($this->step < 2) {
            $this->step++;
            $this->dispatch('step-changed', step: $this->step);
        }
    }

    public function prevStep(): void
    {
        if ($this->step > 1) {
            $this->step--;
            $this->dispatch('step-changed', step: $this->step);
        }
    }

    /**
     * Polish summary text using AI.
     */
    public function polishSummary(): void
    {
        if (empty($this->data['summary'])) {
            session()->flash('ai_error', 'Silakan isi ringkasan profil terlebih dahulu.');
            return;
        }

        $gemini = app(\App\Services\GeminiService::class);
        $result = $gemini->polishText($this->data['summary'], 'summary');

        if ($result['success']) {
            $this->data['summary'] = trim($result['text']);
            session()->flash('ai_success', 'Ringkasan profil berhasil diperbaiki!');
        } else {
            session()->flash('ai_error', 'Gagal: ' . $result['error']);
        }
    }

    /**
     * Polish experience description using AI.
     */
    public function polishExperience(int $index): void
    {
        if (empty($this->data['experience'][$index]['description'])) {
            session()->flash('ai_error', 'Silakan isi deskripsi pekerjaan terlebih dahulu.');
            return;
        }

        $gemini = app(\App\Services\GeminiService::class);
        $result = $gemini->polishText($this->data['experience'][$index]['description'], 'experience');

        if ($result['success']) {
            $this->data['experience'][$index]['description'] = trim($result['text']);
            session()->flash('ai_success', 'Deskripsi pekerjaan berhasil diperbaiki!');
        } else {
            session()->flash('ai_error', 'Gagal: ' . $result['error']);
        }
    }

    /**
     * Render the component view.
     * 
     * @return View
     */
    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.member.cv-editor')->title('Edit CV ATS');
    }
}
