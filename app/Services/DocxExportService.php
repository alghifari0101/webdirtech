<?php

declare(strict_types=1);

namespace App\Services;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\IOFactory;

/**
 * Service for exporting CV data to DOCX format.
 */
final class DocxExportService
{
    /**
     * Generate a DOCX file from CV data.
     */
    public function export(array $data, array $labels): string
    {
        $phpWord = new PhpWord();

        // Define Styles
        $phpWord->addTitleStyle(1, ['size' => 18, 'bold' => true, 'name' => 'Arial'], ['alignment' => Jc::LEFT, 'spaceAfter' => 240]);
        $phpWord->addTitleStyle(2, ['size' => 12, 'bold' => true, 'name' => 'Arial', 'color' => '2563eb', 'allCaps' => true], ['spaceBefore' => 240, 'spaceAfter' => 120, 'borderBottomSize' => 6, 'borderBottomColor' => 'e2e8f0']);
        
        $section = $phpWord->addSection([
            'marginLeft' => 1134, // ~20mm
            'marginRight' => 1134,
            'marginTop' => 1134,
            'marginBottom' => 1134,
        ]);

        // Header: Name & Contact
        $section->addTitle($data['full_name'] ?: 'Your Name', 1);
        
        $contactText = [];
        if (!empty($data['location'])) $contactText[] = $data['location'];
        if (!empty($data['phone'])) $contactText[] = $data['phone'];
        if (!empty($data['email'])) $contactText[] = $data['email'];
        if (!empty($data['linkedin'])) $contactText[] = str_replace(['https://','linkedin.com/in/','www.'], '', $data['linkedin']);
        
        $section->addText(implode(' | ', $contactText), ['size' => 10, 'name' => 'Arial'], ['spaceAfter' => 480]);

        // Content Sections
        foreach ($data['section_order'] as $sectionKey) {
            switch ($sectionKey) {
                case 'summary':
                    if (!empty($data['summary'])) {
                        $section->addTitle($labels['summary'] ?? 'Professional Summary', 2);
                        $section->addText($data['summary'], ['size' => 11, 'name' => 'Arial'], ['alignment' => Jc::BOTH]);
                    }
                    break;

                case 'experience':
                    if (!empty($data['experience'])) {
                        $section->addTitle($labels['experience'] ?? 'Work Experience', 2);
                        foreach ($data['experience'] as $exp) {
                            $table = $section->addTable();
                            $table->addRow();
                            $table->addCell(4500)->addText($exp['position'] ?: 'Position', ['bold' => true, 'size' => 11, 'name' => 'Arial']);
                            $table->addCell(4500)->addText($exp['period'] ?: 'Period', ['bold' => true, 'size' => 11, 'name' => 'Arial'], ['alignment' => Jc::RIGHT]);
                            
                            $section->addText(($exp['company'] ?: 'Company') . ' | ' . ($exp['location'] ?: 'Location'), ['size' => 10, 'italic' => true, 'name' => 'Arial'], ['spaceAfter' => 120]);
                            
                            if (!empty($exp['description'])) {
                                $this->addHtmlText($section, $exp['description']);
                            }
                            $section->addText('', [], ['spaceAfter' => 120]);
                        }
                    }
                    break;

                case 'education':
                    if (!empty($data['education'])) {
                        $section->addTitle($labels['education'] ?? 'Education', 2);
                        foreach ($data['education'] as $edu) {
                            $table = $section->addTable();
                            $table->addRow();
                            $table->addCell(4500)->addText($edu['school'] ?: 'Institution', ['bold' => true, 'size' => 11, 'name' => 'Arial']);
                            $table->addCell(4500)->addText($edu['period'] ?: 'Period', ['bold' => true, 'size' => 11, 'name' => 'Arial'], ['alignment' => Jc::RIGHT]);
                            
                            $section->addText($edu['degree'] ?: 'Degree', ['size' => 10, 'name' => 'Arial'], ['spaceAfter' => 120]);
                            
                            if (!empty($edu['description'])) {
                                $this->addHtmlText($section, $edu['description']);
                            }
                            $section->addText('', [], ['spaceAfter' => 120]);
                        }
                    }
                    break;

                case 'skills':
                    if (!empty($data['skills'])) {
                        $skills = array_filter($data['skills']);
                        if (!empty($skills)) {
                            $section->addTitle($labels['skills'] ?? 'Skills', 2);
                            $section->addText(implode(', ', $skills), ['size' => 11, 'name' => 'Arial']);
                        }
                    }
                    break;

                case 'certifications':
                    if (!empty($data['certifications'])) {
                        $section->addTitle('Certifications & Training', 2);
                        foreach ($data['certifications'] as $cert) {
                            $table = $section->addTable();
                            $table->addRow();
                            $table->addCell(4500)->addText($cert['name'] ?: 'Certification', ['bold' => true, 'size' => 11, 'name' => 'Arial']);
                            $table->addCell(4500)->addText($cert['date'] ?: '', ['size' => 10, 'name' => 'Arial'], ['alignment' => Jc::RIGHT]);
                            
                            $section->addText($cert['issuer'] ?: 'Issuer', ['size' => 10, 'name' => 'Arial'], ['spaceAfter' => 60]);
                            
                            if (!empty($cert['description'])) {
                                $this->addHtmlText($section, $cert['description']);
                            }
                        }
                    }
                    break;

                case 'projects':
                    if (!empty($data['projects'])) {
                        $section->addTitle($labels['projects'] ?? 'Projects', 2);
                        foreach ($data['projects'] as $proj) {
                            $section->addText($proj['name'] ?: 'Project Name', ['bold' => true, 'size' => 11, 'name' => 'Arial']);
                            if (!empty($proj['link'])) {
                                $section->addText($proj['link'], ['size' => 9, 'color' => '2563eb', 'name' => 'Arial']);
                            }
                            if (!empty($proj['description'])) {
                                $this->addHtmlText($section, $proj['description']);
                            }
                            $section->addText('', [], ['spaceAfter' => 120]);
                        }
                    }
                    break;

                case 'languages':
                    if (!empty($data['languages'])) {
                        $section->addTitle($labels['languages'] ?? 'Languages', 2);
                        foreach ($data['languages'] as $lang) {
                            $section->addListItem(($lang['name'] ?: 'Language') . (!empty($lang['level']) ? ' - ' . $lang['level'] : ''), 0, ['size' => 11, 'name' => 'Arial']);
                        }
                    }
                    break;
            }
        }

        $tempFile = tempnam(sys_get_temp_dir(), 'cv_') . '.docx';
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save($tempFile);

        return $tempFile;
    }

    /**
     * Add text that may contain newlines or simple bullet points.
     */
    private function addHtmlText($section, string $text): void
    {
        $lines = explode("\n", str_replace(["\r\n", "\r"], "\n", $text));
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;
            
            // Basic bullet point detection (if line starts with - or *)
            if (str_starts_with($line, '-') || str_starts_with($line, '*')) {
                $section->addListItem(ltrim($line, '-* '), 0, ['size' => 10, 'name' => 'Arial'], null, ['spaceAfter' => 60]);
            } else {
                $section->addText($line, ['size' => 10, 'name' => 'Arial'], ['spaceAfter' => 60]);
            }
        }
    }
}
