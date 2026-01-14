<!-- Template: CV ATS 003 (Bold Modern) -->
<div style="background: #ffffff; min-height: 297mm; color: #000000; font-family: 'Helvetica', 'Arial', sans-serif; font-size: 11pt; line-height: 1.5;">
    <div style="padding: 0 10mm 15mm 10mm;" class="print:!py-0">
        
        <!-- Header -->
        <div style="margin-bottom: 20px;">
            <h1 style="font-size: 28pt; font-weight: 800; margin: 0; text-transform: uppercase; letter-spacing: -0.5px; line-height: 1.1;">{{ $data['full_name'] ?: ($labels['placeholder_name'] ?? 'Your Name') }}</h1>
            <div style="margin-top: 10px; font-size: 10pt; color: #000000; font-weight: 500;">
                 <span style="display: inline-block; margin-right: 15px;">{{ $data['email'] ?: ($labels['placeholder_email'] ?? 'email@example.com') }}</span>
                 <span style="display: inline-block; margin-right: 15px;">{{ $data['phone'] ?: ($labels['placeholder_phone'] ?? '08123456789') }}</span>
                 @if(!empty($data['location'])) <span style="display: inline-block; margin-right: 15px;">{{ $data['location'] }}</span> @endif
                 @if(!empty($data['linkedin'])) <span style="display: inline-block;">{{ str_replace(['https://','linkedin.com/in/','www.'], '', $data['linkedin']) }}</span> @endif
            </div>
        </div>

        @foreach($data['section_order'] as $section)
            @if($section === 'summary')
                <!-- Summary -->
                <div style="margin-bottom: 20px;">
                    <p style="margin: 0; text-align: justify; color: #000000;">{{ $data['summary'] ?: 'Tulis ringkasan profil profesional Anda di sini...' }}</p>
                </div>
            @endif

            @if($section === 'experience')
                <!-- Experience -->
                <div style="margin-bottom: 20px;">
                    <div style="font-size: 14pt; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 4px solid #000; padding-bottom: 5px; margin-bottom: 15px; display: inline-block;">
                        {{ $labels['experience'] ?? 'Employment History' }}
                    </div>
                    @forelse($data['experience'] as $exp)
                    <div style="margin-bottom: 15px;">
                        <div style="font-weight: 700; font-size: 12pt; color: #000000;">{{ $exp['position'] ?: 'Posisi Pekerjaan' }}</div>
                        <div style="display: flex; justify-content: space-between; font-weight: 600; font-size: 10pt; color: #000000; margin-bottom: 5px;">
                            <span>{{ $exp['company'] ?: 'Nama Perusahaan' }} | {{ $exp['location'] ?: 'Lokasi' }}</span>
                            <span>{{ $exp['period'] ?: 'Periode' }}</span>
                        </div>
                        @if(!empty($exp['description']))
                        <div style="margin-top: 5px; font-size: 10.5pt;">
                            {!! nl2br(e($exp['description'])) !!}
                        </div>
                        @endif
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #666; font-style: italic;">{{ $labels['no_exp'] ?? 'Belum ada pengalaman yang diisi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'education')
                <!-- Education -->
                <div style="margin-bottom: 20px;">
                    <div style="font-size: 14pt; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 4px solid #000; padding-bottom: 5px; margin-bottom: 15px; display: inline-block;">
                        {{ $labels['education'] ?? 'Education' }}
                    </div>
                    @forelse($data['education'] as $edu)
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: 700; color: #000;">{{ $edu['school'] ?: 'Nama Institusi' }} @if(!empty($edu['location'])) | {{ $edu['location'] }} @endif</div>
                        <div style="display: flex; justify-content: space-between; font-size: 10pt;">
                            <span>{{ $edu['degree'] ?: 'Gelar / Jurusan' }}</span>
                            <span style="font-weight: 600;">{{ $edu['period'] ?: 'Periode' }}</span>
                        </div>
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #666; font-style: italic;">{{ $labels['no_edu'] ?? 'Belum ada pendidikan yang diisi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'organizations')
                <!-- Organizations -->
                <div style="margin-bottom: 20px;">
                    <div style="font-size: 14pt; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 4px solid #000; padding-bottom: 5px; margin-bottom: 15px; display: inline-block;">
                        {{ $labels['organization'] ?? 'Organizations' }}
                    </div>
                    @forelse($data['organizations'] as $org)
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: 700; color: #000;">{{ $org['name'] ?: 'Nama Organisasi' }}</div>
                        <div style="display: flex; justify-content: space-between; font-size: 10pt;">
                            <span>{{ $org['position'] ?: 'Jabatan' }}</span>
                            <span style="font-weight: 600;">{{ $org['period'] ?: 'Periode' }}</span>
                        </div>
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #666; font-style: italic;">{{ $labels['no_org'] ?? 'Belum ada riwayat organisasi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'skills')
                <!-- Skills -->
                <div style="margin-bottom: 20px;">
                    <div style="font-size: 14pt; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 4px solid #000; padding-bottom: 5px; margin-bottom: 15px; display: inline-block;">
                        {{ $labels['skills'] ?? 'Core Competencies' }}
                    </div>
                    <ul style="margin: 0; padding-left: 20px; font-size: 10.5pt;">
                        @forelse(array_filter($data['skills']) as $skill)
                            <li style="margin-bottom: 2px;">{{ $skill }}</li>
                        @empty
                            <li style="font-size: 10pt; color: #666; font-style: italic;">Keahlian belum diisi.</li>
                        @endforelse
                    </ul>
                </div>
            @endif

            @if($section === 'projects')
                <!-- Projects -->
                <div style="margin-bottom: 20px;">
                    <div style="font-size: 14pt; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 4px solid #000; padding-bottom: 5px; margin-bottom: 15px; display: inline-block;">
                        {{ $labels['projects'] ?? 'Key Projects' }}
                    </div>
                    @forelse($data['projects'] as $proj)
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: 700; font-size: 10.5pt;">{{ $proj['name'] ?: 'Nama Proyek' }}</div>
                        <div style="font-size: 10pt; line-height: 1.3;">{!! nl2br(e($proj['description'])) !!}</div>
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #666; font-style: italic;">{{ $labels['no_projects'] ?? 'Belum ada proyek yang diisi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'certifications')
                <!-- Certifications -->
                <div style="margin-bottom: 20px;">
                    <div style="font-size: 14pt; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 4px solid #000; padding-bottom: 5px; margin-bottom: 15px; display: inline-block;">
                        Sertifikasi & Pelatihan
                    </div>
                    @forelse($data['certifications'] as $cert)
                    <div style="margin-bottom: 12px;">
                        <div style="display: flex; justify-content: space-between; align-items: baseline;">
                            <div style="font-weight: 800; font-size: 11pt;">{{ $cert['name'] ?: 'Nama Sertifikasi' }}</div>
                            <div style="font-size: 10pt; font-weight: 700;">{{ $cert['date'] ?: 'Tanggal' }}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: baseline; margin-top: 2px;">
                            <div style="font-weight: 700; font-size: 10pt; color: #333;">{{ $cert['issuer'] ?: 'Penerbit' }}</div>
                            @if(!empty($cert['link']))
                                <div style="font-size: 9pt; color: #000;">{{ str_replace(['https://', 'http://'], '', $cert['link']) }}</div>
                            @endif
                        </div>
                        @if(!empty($cert['description']))
                            <div style="margin-top: 3px; font-size: 10.5pt;">{!! nl2br(e($cert['description'])) !!}</div>
                        @endif
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #666; font-style: italic;">Belum ada sertifikasi yang diisi.</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'languages')
                <!-- Languages -->
                <div style="margin-bottom: 20px;">
                    <div style="font-size: 14pt; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 4px solid #000; padding-bottom: 5px; margin-bottom: 15px; display: inline-block;">
                        {{ $labels['languages'] ?? 'Languages' }}
                    </div>
                    <ul style="margin: 0; padding-left: 20px; font-size: 11pt;">
                        @forelse($data['languages'] as $lang)
                            <li><strong>{{ $lang['name'] ?: 'Bahasa' }}</strong> @if(!empty($lang['level']))- {{ $lang['level'] }}@endif</li>
                        @empty
                            <li style="font-size: 10pt; color: #666; font-style: italic;">Bahasa belum diisi.</li>
                        @endforelse
                    </ul>
                </div>
            @endif
        @endforeach

    </div>
</div>
