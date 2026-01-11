<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Service for interacting with Google Gemini API.
 */
final class GeminiService
{
    protected string $apiKey;
    protected string $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent';

    public function __construct()
    {
        $this->apiKey = (string) config('services.gemini.api_key', '');
    }

    /**
     * Polish/rewrite text to be more professional for CV.
     */
    public function polishText(string $text, string $context = 'summary'): array
    {
        if (empty($this->apiKey)) {
            return ['success' => false, 'error' => 'API key tidak dikonfigurasi'];
        }

        if (empty(trim($text))) {
            return ['success' => false, 'error' => 'Teks kosong'];
        }

        $prompt = $this->buildPrompt($text, $context);

        try {
            $response = Http::timeout(30)
                ->post($this->baseUrl . '?key=' . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 1000,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $result = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
                if ($result) {
                    return ['success' => true, 'text' => $result];
                }
                return ['success' => false, 'error' => 'Respons tidak valid'];
            }

            $body = $response->json();
            $errorMsg = $body['error']['message'] ?? 'Unknown error';
            Log::error('Gemini API error', ['status' => $response->status(), 'error' => $errorMsg]);
            return ['success' => false, 'error' => $errorMsg];

        } catch (\Exception $e) {
            Log::error('Gemini API exception', ['message' => $e->getMessage()]);
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Generate a professional cover letter using AI.
     */
    public function generateCoverLetter(array $input): array
    {
        if (empty($this->apiKey)) {
            return ['success' => false, 'error' => 'API key tidak dikonfigurasi'];
        }

        // Extract with defaults to prevent "Undefined array key" errors
        $name = $input['name'] ?? '';
        $email = $input['email'] ?? '';
        $phone = $input['phone'] ?? '';
        $address = $input['address'] ?? '';
        $date = $input['date'] ?? now()->translatedFormat('d F Y');
        $position = $input['position'] ?? '';
        $company = $input['company'] ?? '';
        $tone = $input['tone'] ?? 'Formal';
        $skills = $input['skills'] ?? '';

        $prompt = "Tugas: Tulis Surat Lamaran Kerja Formal yang ELEGAN dan PROFESIONAL.
        IKUTI LAYOUT BERIKUT DENGAN SANGAT DISIPLIN (Sesuai Referensi Gambar):

        DATA INPUT:
        - Nama Pelamar: {$name}
        - Email: {$email}
        - No. HP: {$phone}
        - Alamat: {$address}
        - Tanggal: {$date}
        - Melamar Sebagai: {$position}
        - Ke Perusahaan: {$company}
        - Tone: {$tone}
        - Skill Utama: {$skills}

        PESAN PENTING UNTUK LAYOUT:
        1. BAGIAN PENGIRIM (Wajib di Pojok Kanan Atas):
           {$name}
           {$address}
           {$phone}
           {$email}
        
        2. TANGGAL (Di sisi Kiri):
           Jakarta (atau Kota di Alamat), {$date}

        3. PERIHAL & LAMPIRAN (Di bawah tanggal):
           Perihal: Lamaran Kerja untuk Posisi {$position}
           Lampiran: 1 (satu) Berkas CV

        4. TUJUAN (Di bawah perihal):
           Kepada Yth.,
           HRD {$company}
           Jakarta (atau Kota Perusahaan)

        5. SALAM & ISI SURAT:
           Dengan Hormat,
           
           (Paragraf 1: Pembukaan & Ketertarikan posisi {$position})
           
           (Paragraf 2: Latar Belakang Pendidikan & Pengalaman Singkat)
           
           (Paragraf 3: Keunggulan Diri/Skill berkaitan dengan {$skills})
           
           (Paragraf 4: Kesimpulan, Lampiran [CV], & Harapan Interview)

        6. PENUTUP (Sisi Kiri bawah):
           Terima kasih atas perhatian Anda terhadap lamaran saya.

           Hormat saya,

           {$name}

        INSTRUKSI FINAL:
        - GUNAKAN JARAK BARIS (ENTER) UNTUK SETIAP BAGIAN.
        - HASIL HARUS BERSIH, TANPA TANDA BINTANG (*) UNTUK BOLD.
        - TULIS DALAM BAHASA INDONESIA FORMAL.
        - BERIKAN HANYA ISI SURAT.";

        try {
            $response = Http::timeout(45)
                ->post($this->baseUrl . '?key=' . $this->apiKey, [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.5,
                    'maxOutputTokens' => 2000,
                ]
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $result = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
                
                if ($result) {
                    Log::info('Gemini Cover Letter Result', ['text' => $result]);
                    return ['success' => true, 'text' => $result];
                }
                return ['success' => false, 'error' => 'Respons tidak valid'];
            }

            $body = $response->json();
            $errorMsg = $body['error']['message'] ?? 'Gagal menghubungi AI';
            Log::error('Gemini API error (Cover Letter)', ['status' => $response->status(), 'error' => $errorMsg]);
            return ['success' => false, 'error' => $errorMsg];

        } catch (\Exception $e) {
            Log::error('Gemini API exception (Cover Letter)', ['message' => $e->getMessage()]);
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }

    /**
     * Build the prompt based on context.
     */
    protected function buildPrompt(string $text, string $context): string
    {
        $baseInstruction = "Kamu adalah seorang HR profesional dan career coach pakar penulisan CV. Tugas kamu adalah menulis ulang teks CV berikut menjadi versi yang jauh lebih berbobot, elegan, dan menarik bagi rekruter (compelling). Gunakan standar bahasa profesional yang tinggi dengan action verbs yang kuat. Pastikan kalimat mengalir dengan baik dan tidak terpotong. Jika input pendek, kembangkan gaya bahasanya agar menjadi ringkasan profesional yang solid (2-3 kalimat) namun TETAP berbasis pada fakta atau peran yang disebutkan. Jika teks asli dalam Bahasa Indonesia, tulis ulang dalam Bahasa Indonesia. Jika dalam Bahasa Inggris, tulis ulang dalam Bahasa Inggris. Berikan HANYA hasil teks yang sudah diperbaiki, tanpa penjelasan tambahan.";

        if ($context === 'summary') {
            return $baseInstruction . "\n\nTeks ringkasan profil (Summary) yang perlu diperbaiki:\n\n" . $text;
        }

        if ($context === 'experience') {
            return $baseInstruction . "\n\nDeskripsi pengalaman kerja yang perlu diperbaiki:\n\n" . $text;
        }

        return $baseInstruction . "\n\nTeks yang perlu diperbaiki:\n\n" . $text;
    }
}
