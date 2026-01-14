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
        'certifications' => [],
        'section_order' => [],
        'template' => '',
        'language' => 'id',
    ];

    public function mount(): void
    {
        $this->data['template'] = config('cv.templates')[0];
        $this->data['section_order'] = config('cv.default_section_order');

        \Illuminate\Support\Facades\Gate::authorize('member');
        
        $cv = CvData::where('user_id', auth()->id())->first();
        if ($cv) {
            $this->data = array_merge($this->data, $cv->toArray());
            
            // If the user has an old template, migrate them to the new default
            if (!in_array($this->data['template'], config('cv.templates'))) {
                $this->data['template'] = config('cv.templates')[0];
            }

            // Ensure specific keys are definitely initialized if NULL in DB
            if (empty($this->data['experience'])) $this->data['experience'] = [];
            if (empty($this->data['education'])) $this->data['education'] = [];
            if (empty($this->data['organizations'])) $this->data['organizations'] = [];
            if (empty($this->data['projects'])) $this->data['projects'] = [];
            if (empty($this->data['skills'])) $this->data['skills'] = [];
            if (empty($this->data['languages'])) $this->data['languages'] = [];
            if (empty($this->data['certifications'])) $this->data['certifications'] = [];
            if (empty($this->data['section_order'])) {
                $this->data['section_order'] = config('cv.default_section_order');
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

        $this->validate([
            'data.full_name' => 'required|min:3',
            'data.email' => 'required|email',
            'data.linkedin' => 'nullable|string',
            'data.website' => 'nullable|string',
            'data.template' => 'required|in:' . implode(',', config('cv.templates')),
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

    public function addCertification(): void
    {
        $this->data['certifications'][] = [
            'name' => '',
            'issuer' => '',
            'date' => '',
            'link' => '',
            'description' => '',
        ];
    }

    public function removeCertification(int $index): void
    {
        unset($this->data['certifications'][$index]);
        $this->data['certifications'] = array_values($this->data['certifications']);
    }

    public function polishCertification(int $index): void
    {
        if (empty($this->data['certifications'][$index]['description'])) {
            session()->flash('ai_error', 'Silakan isi deskripsi sertifikasi terlebih dahulu.');
            return;
        }

        $gemini = app(\App\Contracts\AiServiceInterface::class);
        $result = $gemini->polishText($this->data['certifications'][$index]['description'], 'experience'); // Reusing experience prompt style

        if ($result['success']) {
            $this->data['certifications'][$index]['description'] = trim($result['text']);
            session()->flash('ai_success', 'Deskripsi sertifikasi berhasil diperbaiki!');
        } else {
            session()->flash('ai_error', 'Gagal: ' . $result['error']);
        }
    }

    public function setStep(int $step): void
    {
        $this->step = $step;
        $this->dispatch('step-changed', step: $step);
    }

    public function moveSection(string $section, string $direction): void
    {
        $order = $this->data['section_order'];
        $index = array_search($section, $order);

        if ($index === false) return;

        $newIndex = $direction === 'up' ? $index - 1 : $index + 1;

        if ($newIndex < 0 || $newIndex >= count($order)) return;

        // Swap items
        $temp = $order[$index];
        $order[$index] = $order[$newIndex];
        $order[$newIndex] = $temp;

        $this->data['section_order'] = $order;
        $this->save(app(SaveCvDataAction::class));
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

        $gemini = app(\App\Contracts\AiServiceInterface::class);
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

        $gemini = app(\App\Contracts\AiServiceInterface::class);
        $result = $gemini->polishText($this->data['experience'][$index]['description'], 'experience');

        if ($result['success']) {
            $this->data['experience'][$index]['description'] = trim($result['text']);
            session()->flash('ai_success', 'Deskripsi pekerjaan berhasil diperbaiki!');
        } else {
            session()->flash('ai_error', 'Gagal: ' . $result['error']);
        }
    }

    /**
     * Get localized labels for CV sections.
     */
    public function getLabels(): array
    {
        $labels = [
            'id' => [
                'summary' => 'Ringkasan Profil',
                'experience' => 'Pengalaman Kerja',
                'education' => 'Pendidikan',
                'organization' => 'Riwayat Organisasi',
                'skills' => 'Keahlian',
                'projects' => 'Proyek Portofolio',
                'languages' => 'Bahasa',
                'contact' => 'Kontak',
                'placeholder_name' => 'Nama Anda',
                'placeholder_email' => 'email@anda.com',
                'placeholder_phone' => '08xxxxxx',
                'no_exp' => 'Belum ada pengalaman yang diisi.',
                'no_edu' => 'Belum ada pendidikan yang diisi.',
                'no_projects' => 'Belum ada proyek yang diisi.',
            ],
            'en' => [
                'summary' => 'Professional Summary',
                'experience' => 'Work Experience',
                'education' => 'Education',
                'organization' => 'Organizational History',
                'skills' => 'Skills',
                'projects' => 'Key Projects',
                'languages' => 'Languages',
                'contact' => 'Contact',
                'location' => 'Location',
                'placeholder_name' => 'Your Name',
                'placeholder_email' => 'email@example.com',
                'placeholder_phone' => '+62xxxxxx',
                'no_exp' => 'No experience added yet.',
                'no_edu' => 'No education added yet.',
                'no_org' => 'No organizational history added yet.',
                'no_projects' => 'No projects added yet.',
            ]
        ];

        return $labels[$this->data['language']] ?? $labels['id'];
    }

    /**
     * Download CV as DOCX.
     */
    public function downloadDocx(\App\Services\DocxExportService $service): ?\Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        \Illuminate\Support\Facades\Gate::authorize('member');

        // Premium check (optional, but consistent with PDF)
        // Only free for cv_ats_001 if not premium
        if (!auth()->user()->is_premium && $this->data['template'] !== 'cv_ats_001') {
            $this->dispatch('show-upgrade-modal');
            return null;
        }

        $labels = $this->getLabels();
        $filePath = $service->export($this->data, $labels);

        $filename = 'CV_' . str_replace(' ', '_', $this->data['full_name']) . '.docx';

        return response()->download($filePath, $filename)->deleteFileAfterSend(true);
    }

    /**
     * Render the component view.
     * 
     * @return View
     */
    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.member.cv-editor', [
            'labels' => $this->getLabels()
        ])->title('Edit CV ATS');
    }
}
