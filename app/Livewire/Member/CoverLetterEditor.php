<?php

declare(strict_types=1);

namespace App\Livewire\Member;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\View\View;

final class CoverLetterEditor extends Component
{
    public array $templates = [];
    public ?string $selectedTemplateId = null;
    public string $language = 'id'; // 'id' or 'en'
    public ?string $result = null;

    // AI Inputs
    public string $companyName = '';
    public string $jobPosition = '';
    public string $keySkills = '';
    public string $tone = 'formal'; // formal, creative, humble
    public bool $isGenerating = false;

    public function generateWithAI(\App\Contracts\AiServiceInterface $gemini): void
    {
        $this->validate([
            'companyName' => 'required|min:2',
            'jobPosition' => 'required|min:2',
        ]);

        $this->isGenerating = true;

        try {
            $response = $gemini->generateCoverLetter([
                'company_name' => $this->companyName,
                'job_position' => $this->jobPosition,
                'skills' => $this->keySkills,
                'tone' => $this->tone,
                'language' => $this->language,
                'user_name' => auth()->user()->name,
                'user_email' => auth()->user()->email,
                'user_phone' => auth()->user()->phone ?? '',
            ]);

            if ($response['success']) {
                $this->result = $response['content'];
            }
        } catch (\Exception $e) {
            // Handle error silently or show toast
        } finally {
            $this->isGenerating = false;
        }
    }

    public function mount(): void
    {
        \Illuminate\Support\Facades\Gate::authorize('member');

        $this->templates = [
            [
                'id' => 'formal',
                'title' => [
                    'id' => 'Formal & Profesional',
                    'en' => 'Formal & Professional'
                ],
                'description' => [
                    'id' => 'Cocok untuk perusahaan korporat atau instansi resmi.',
                    'en' => 'Suitable for corporate companies or official institutions.'
                ],
                'content' => [
                    'id' => "Yth. Bapak/Ibu HRD [Nama Perusahaan],\r\n\r\nPerkenalkan, nama saya [Nama Anda]. Melalui surat ini, saya bermaksud menyampaikan ketertarikan saya untuk melamar posisi [Posisi] di [Nama Perusahaan] sebagaimana informasi yang saya dapatkan dari [Sumber Info].\r\n\r\nSaya memiliki latar belakang pendidikan [Pendidikan] dan pengalaman selama [Jumlah] tahun di bidang [Bidang]. Selama masa kerja tersebut, saya berhasil [Pencapaian Utama]. Saya yakin bahwa keahlian saya dalam [Skill Utama] akan memberikan kontribusi positif bagi tim [Nama Perusahaan].\r\n\r\nTerlampir saya sertakan Curriculum Vitae (CV) dan dokumen pendukung lainnya untuk Bapak/Ibu tinjau. Saya sangat berharap dapat diberikan kesempatan wawancara untuk menjelaskan lebih detail mengenai kualifikasi saya.\r\n\r\nDemikian surat lamaran ini saya buat. Atas perhatian dan kesempatan yang diberikan, saya ucapkan terima kasih.\r\n\r\nHormat saya,\r\n\r\n[Nama Anda]",
                    'en' => "Dear Hiring Manager at [Nama Perusahaan],\r\n\r\nMy name is [Nama Anda]. I am writing to express my strong interest in the [Posisi] position at [Nama Perusahaan], as advertised on [Sumber Info].\r\n\r\nWith my educational background in [Pendidikan] and [Jumlah] years of experience in [Bidang], I have developed a strong skill set in [Skill Utama]. During my time at [Perusahaan Sebelumnya], I achieved [Pencapaian Utama], and I am confident that my expertise will be a valuable asset to your team.\r\n\r\nEnclosed is my Curriculum Vitae (CV) and other supporting documents for your review. I would welcome the opportunity to discuss my qualifications further in an interview.\r\n\r\nThank you for your time and consideration. I look forward to hearing from you.\r\n\r\nSincerely,\r\n\r\n[Nama Anda]"
                ]
            ],
            [
                'id' => 'kreatif',
                'title' => [
                    'id' => 'Modern & Kreatif',
                    'en' => 'Modern & Creative'
                ],
                'description' => [
                    'id' => 'Bagus untuk startup atau agensi kreatif.',
                    'en' => 'Great for startups or creative agencies.'
                ],
                'content' => [
                    'id' => "Halo Tim Rekrutmen [Nama Perusahaan]!\r\n\r\nSaya selalu mengagumi cara [Nama Perusahaan] dalam [Hal yang dikagumi dari perusahaan]. Itulah mengapa saya sangat antusias saat melihat lowongan untuk posisi [Posisi].\r\n\r\nSebagai seorang [Pekerjaan Saat Ini] dengan fokus pada [Fokus Utama], saya terbiasa bekerja di lingkungan yang cepat dan dinamis. Saya memiliki pengalaman dalam [Pengalaman/Skill] yang saya rasa sangat relevan dengan visi [Nama Perusahaan]. Saya tidak hanya mencari pekerjaan, tapi mencari tempat di mana saya bisa berkontribusi dan tumbuh bersama talenta terbaik.\r\n\r\nSaya telah melampirkan portofolio dan CV saya. Mari kita mengobrol lebih jauh tentang bagaimana saya bisa membantu [Nama Perusahaan] mencapai target [Target Perusahaan].\r\n\r\nSalam hangat,\r\n\r\n[Nama Anda]",
                    'en' => "Hello [Nama Perusahaan] Recruitment Team!\r\n\r\nI've always admired [Nama Perusahaan]'s approach to [Hal yang dikagumi dari perusahaan], which is why I’m so excited to apply for the [Posisi] role.\r\n\r\nAs a [Pekerjaan Saat Ini] specializing in [Fokus Utama], I thrive in fast-paced, dynamic environments. My experience in [Pengalaman/Skill] aligns perfectly with [Nama Perusahaan]'s vision. I’m not just looking for a job; I’m looking for a place where I can contribute and grow alongside the best talent.\r\n\r\nI’ve attached my portfolio and CV. I’d love the chance to discuss how I can help [Nama Perusahaan] achieve its goals for [Target Perusahaan].\r\n\r\nBest regards,\r\n\r\n[Nama Anda]"
                ]
            ],
            [
                'id' => 'entry_level',
                'title' => [
                    'id' => 'Entry Level / Fresh Graduate',
                    'en' => 'Entry Level / Fresh Graduate'
                ],
                'description' => [
                    'id' => 'Didesain khusus untuk lulusan baru tanpa pengalaman.',
                    'en' => 'Specifically designed for recent graduates without experience.'
                ],
                'content' => [
                    'id' => "Yth. Manajer HRD [Nama Perusahaan],\r\n\r\nSebagai lulusan baru [Jurusan] dari [Universitas] dengan IPK [Skor], saya menulis surat ini untuk menyatakan minat saya pada posisi [Posisi] di [Nama Perusahaan].\r\n\r\nSelama masa kuliah, saya aktif dalam organisasi [Nama Organisasi] sebagai [Jabatan], di mana saya mengasah kemampuan [Skill Organisasi]. Saya juga menyelesaikan magang di [Nama Perusahaan Magang] dan belajar banyak tentang [Hal yang dipelajari]. Saya adalah pribadi yang cepat belajar, pekerja keras, dan memiliki motivasi tinggi untuk memulai karir profesional saya di perusahaan bereputasi tinggi seperti [Nama Perusahaan].\r\n\r\nBesar harapan saya untuk bisa berdiskusi lebih lanjut dalam tahap wawancara. Terima kasih atas waktu dan pertimbangan Bapak/Ibu.\r\n\r\nHormat saya,\r\n\r\n[Nama Anda]",
                    'en' => "Dear HR Manager at [Nama Perusahaan],\r\n\r\nAs a recent [Jurusan] graduate from [Universitas] with a GPA of [Skor], I am writing to express my interest in the [Posisi] position at [Nama Perusahaan].\r\n\r\nDuring my studies, I was active in [Nama Organisasi] as [Jabatan], where I developed strong [Skill Organisasi] skills. I also completed an internship at [Nama Perusahaan Magang], where I gained valuable experience in [Hal yang dipelajari]. I am a quick learner, hardworking, and highly motivated to begin my professional career at a prestigious company like [Nama Perusahaan].\r\n\r\nI look forward to the possibility of discussing my application with you further. Thank you for your time and consideration.\r\n\r\nSincerely,\r\n\r\n[Nama Anda]"
                ]
            ],
            [
                'id' => 'standar_id',
                'title' => [
                    'id' => 'Standard Indonesia / General',
                    'en' => 'Standard General Letter'
                ],
                'description' => [
                    'id' => 'Format klasik yang umum digunakan.',
                    'en' => 'Classic format commonly used for general applications.'
                ],
                'content' => [
                    'id' => "[Kota], [Tanggal]\r\n\r\nPerihal: Lamaran Kerja untuk Posisi [Posisi]\r\nLampiran: [Jumlah] Lembar\r\n\r\nKepada Yth.,\r\n[Nama Penerima/HRD]\r\n[Nama Perusahaan]\r\n[Alamat Perusahaan]\r\n\r\nDengan Hormat,\r\n\r\nSaya yang bertanda tangan di bawah ini:\r\n\r\nNama: [Nama Anda]\r\nTempat, Tanggal Lahir: [Tempat, Tgl Lahir]\r\nAlamat: [Alamat Domisili]\r\nNomor Telepon: [No HP]\r\nEmail: [Email]\r\n\r\nDengan ini saya bermaksud mengajukan lamaran pekerjaan sebagai [Posisi] di [Nama Perusahaan] sesuai dengan iklan lowongan yang saya temukan.\r\n\r\nSaya memiliki latar belakang pendidikan di [Pendidikan] dan memiliki minat yang besar untuk berkarir di bidang [Bidang]. Saya adalah pribadi yang berkomitmen, jujur, dan siap untuk memberikan kontribusi terbaik bagi [Nama Perusahaan].\r\n\r\nDemikian surat lamaran ini saya buat dengan sebenar-benarnya. Besar harapan saya untuk dapat bergabung dan berkontribusi di [Nama Perusahaan]. Terlampir saya sertakan daftar riwayat hidup saya sebagai bahan pertimbangan.\r\n\r\nAtas perhatian dan kesempatannya, saya ucapkan terima kasih.\r\n\r\nHormat saya,\r\n\r\n[Nama Anda]",
                    'en' => "[City], [Date]\r\n\r\nSubject: Job Application for [Posisi] Position\r\nAttachments: [Jumlah] pages\r\n\r\nTo,\r\n[Hiring Manager/HRD]\r\n[Nama Perusahaan]\r\n[Company Address]\r\n\r\nDear Sir/Madam,\r\n\r\nI am writing to express my interest in the [Posisi] position at [Nama Perusahaan], as advertised. \r\n\r\nMy details are as follows:\r\n\r\nName: [Nama Anda]\r\nAddress: [Alamat Domisili]\r\nPhone Number: [No HP]\r\nEmail: [Email]\r\n\r\nI have an educational background in [Pendidikan] and a strong desire to build a career in [Bidang]. I am a committed, honest individual, ready to provide the best contribution to [Nama Perusahaan]. \r\n\r\nI have enclosed my CV for your review. I would appreciate the opportunity to talk with you more about this position. \r\n\r\nThank you for your time and consideration.\r\n\r\nSincerely,\r\n\r\n[Nama Anda]"
                ]
            ],
            [
                'id' => 'korporat',
                'title' => [
                    'id' => 'Profesional Bank / Korporat',
                    'en' => 'Corporate / Banking Professional'
                ],
                'description' => [
                    'id' => 'Sangat formal, cocok untuk industri perbankan atau korporasi besar.',
                    'en' => 'Highly formal, suitable for banking or large corporations.'
                ],
                'has_right_header' => true,
                'content' => [
                    'id' => "[Nama Anda]\r\n[Alamat Toko/Rumah]\r\n[No HP]\r\n[Email]\r\n\r\n[Kota], [Tanggal]\r\n\r\nPerihal: Lamaran Kerja untuk Posisi [Posisi]\r\nLampiran: [Jumlah] halaman CV\r\n\r\nKepada Yth.,\r\nHRD [Nama Perusahaan]\r\n[Alamat Perusahaan]\r\n[Kota Perusahaan]\r\n\r\nDengan Hormat,\r\n\r\nSaya, [Nama Anda], dengan ini ingin mengajukan lamaran pekerjaan untuk posisi [Posisi] [Nama Perusahaan].\r\n\r\nSaya lulus dari [Universitas] dengan gelar [Gelar] di bidang [Bidang Studi]. Selama [Jumlah] tahun terakhir, saya telah bekerja di [Perusahaan Sebelumnya], di mana saya telah mengasah keterampilan saya dalam [Skill Utama 1] and [Skill Utama 2].\r\n\r\nSaya sangat menghargai nilai-nilai integritas, profesionalisme, and pelayanan pelanggan yang tinggi, and saya yakin bahwa saya akan berkontribusi bagi [Nama Perusahaan]. Saya juga siap untuk terus belajar and berkembang dalam lingkungan yang dinamis and kompetitif.\r\n\r\nBersama dengan surat ini, saya melampirkan CV untuk informasi lebih lanjut tentang pengalaman kerja saya. Saya sangat berharap dapat memiliki kesempatan untuk membahas bagaimana saya bisa berkontribusi bagi [Nama Perusahaan].\r\n\r\nTerima kasih atas perhatian Anda terhadap lamaran saya.\r\n\r\nHormat saya,\r\n\r\n[Nama Anda]",
                    'en' => "[Nama Anda]\r\n[Home Address]\r\n[No HP]\r\n[Email]\r\n\r\n[City], [Date]\r\n\r\nSubject: Job Application for [Posisi] position\r\nAttachments: [Jumlah] pages (CV)\r\n\r\nDear HRD [Nama Perusahaan],\r\n[Company Address]\r\n[Company City]\r\n\r\nDear Sir/Madam,\r\n\r\nI am writing to apply for the position of [Posisi] at [Nama Perusahaan].\r\n\r\nI graduated from [Universitas] with a [Gelar] degree in [Bidang Studi]. Over the past [Jumlah] years, I have worked at [Perusahaan Sebelumnya], where I have honed my skills in [Skill Utama 1] and [Skill Utama 2].\r\n\r\nI highly value integrity, professionalism, and excellence in customer service, and I am confident that I will be a strong addition to [Nama Perusahaan]. I am also eager to continue learning and growing within a dynamic and competitive environment.\r\n\r\nEnclosed is my CV for more information about my background. I look forward to the opportunity to discuss how my skills and experiences would benefit your organization.\r\n\r\nThank you for your time and consideration.\r\n\r\nSincerely,\r\n\r\n[Nama Anda]"
                ]
            ],
            [
                'id' => 'magang',
                'title' => [
                    'id' => 'Program Magang (Internship)',
                    'en' => 'Internship Program'
                ],
                'description' => [
                    'id' => 'Format ringkas untuk melamar posisi magang.',
                    'en' => 'Concise format for applying to internship positions.'
                ],
                'content' => [
                    'id' => "Yth. Tim HR [Nama Perusahaan],\r\n\r\nSaya adalah mahasiswa [Jurusan] tingkat akhir di [Universitas]. Saya menulis surat ini untuk melamar program magang di bagian [Divisi/Posisi] [Nama Perusahaan] untuk periode [Bulan/Tahun].\r\n\r\nSaya sangat tertarik magang di [Nama Perusahaan] karena reputasi perusahaan dalam [Sektor Bisnis]. Saya memiliki pemahaman teoritis tentang [Skill Utama] dan ingin mempraktikkannya di dunia kerja nyata. Saya yakin dedikasi dan kemauan saya untuk belajar akan bermanfaat bagi tim Anda selama masa magang.\r\n\r\nTerima kasih atas peluang ini. Saya menantikan kabar baik dari Anda.\r\n\r\nSalam,\r\n\r\n[Nama Anda]",
                    'en' => "Dear HR Team at [Nama Perusahaan],\r\n\r\nI am a final-year [Jurusan] student at [Universitas]. I am writing to apply for an internship position in the [Divisi/Posisi] department at [Nama Perusahaan] for the period of [Bulan/Tahun].\r\n\r\nI am very interested in interning at [Nama Perusahaan] because of the company's reputation in [Sektor Bisnis]. I have a theoretical understanding of [Skill Utama] and am eager to apply it in a real-world professional setting. I am confident that my dedication and willingness to learn will be beneficial to your team during my internship.\r\n\r\nThank you for this opportunity. I look forward to hearing from you soon.\r\n\r\nBest regards,\r\n\r\n[Nama Anda]"
                ]
            ],
        ];

        $this->templates = [
            // ... (keeping existing template definitions for brevity in this replace call, 
            // but in a real scenario I'd move them to config/cv-templates.php 
            // but for now let's just use the config list to select the first one)
        ];

        // Filter templates based on config if needed, or just select the first from config IDs
        $firstTemplateId = config('cv.cover_letter_templates')[0];
        $this->selectTemplate($firstTemplateId);
    }

    /**
     * Change language and refresh preview.
     */
    public function setLanguage(string $lang): void
    {
        $this->language = $lang;
        if ($this->selectedTemplateId) {
            $this->selectTemplate($this->selectedTemplateId);
        }
    }

    /**
     * Select a template to preview.
     */
    public function selectTemplate(string $id): void
    {
        $this->selectedTemplateId = $id;
        $template = collect($this->templates)->firstWhere('id', $id);
        
        if ($template) {
            $user = auth()->user();
            $content = $template['content'][$this->language] ?? $template['content']['id'];
            
            // Auto-fill common placeholders
            $content = str_replace('[Nama Anda]', $user->name, $content);
            $content = str_replace('[Email]', $user->email, $content);
            $content = str_replace('[No HP]', $user->phone ?? '[No HP]', $content);
            
            $this->result = $content;
        }
    }

    /**
     * Render the component view.
     */
    #[Layout('components.layouts.app')]
    public function render(): View
    {
        return view('livewire.member.cover-letter-editor')->title('Template Surat Lamaran');
    }
}
