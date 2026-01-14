<!-- Template: CV ATS 002 (Classic Serif) -->
<div style="background: #ffffff; min-height: 297mm; color: #000000; font-family: 'Times New Roman', serif; font-size: 11pt; line-height: 1.4;">
    <div style="padding: 0 10mm 15mm 10mm;" class="print:!py-0">
        
        <!-- Header -->
        <div style="text-align: center; border-bottom: 1px solid #000; padding-bottom: 15px; margin-bottom: 20px;">
            <h1 style="font-size: 26pt; font-weight: bold; margin: 0; text-transform: uppercase; letter-spacing: 1px;">{{ $data['full_name'] ?: ($labels['placeholder_name'] ?? 'Your Name') }}</h1>
            <div style="margin-top: 8px; font-size: 10.5pt;">
                @if(!empty($data['location'])) <span>{{ $data['location'] }}</span> <span style="margin: 0 5px;">•</span> @endif
                <span>{{ $data['phone'] ?: ($labels['placeholder_phone'] ?? '08123456789') }}</span> <span style="margin: 0 5px;">•</span>
                <span>{{ $data['email'] ?: ($labels['placeholder_email'] ?? 'email@example.com') }}</span>
                @if(!empty($data['linkedin']))
                    <span style="margin: 0 5px;">•</span>
                    <span>{{ str_replace(['https://','linkedin.com/in/','www.'], '', $data['linkedin']) }}</span>
                @endif
            </div>
        </div>

        @foreach($data['section_order'] as $section)
            @if($section === 'summary')
                <!-- Summary -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #333; margin: 0 0 15px 0; padding-bottom: 2px;">
                        {{ $labels['summary'] ?? 'Professional Summary' }}
                    </h2>
                    <p style="margin: 0; text-align: justify;">{{ $data['summary'] ?: 'Tulis ringkasan profil profesional Anda di sini...' }}</p>
                </div>
            @endif

            @if($section === 'experience')
                <!-- Experience -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #333; margin: 0 0 15px 0; padding-bottom: 2px;">
                        {{ $labels['experience'] ?? 'Experience' }}
                    </h2>
                    @forelse($data['experience'] as $exp)
                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; font-weight: bold;">
                            <span style="font-size: 11.5pt;">{{ $exp['position'] ?: 'Posisi Pekerjaan' }}</span>
                            <span>{{ $exp['period'] ?: 'Periode' }}</span>
                        </div>
                        <div style="margin-bottom: 5px;">
                            {{ $exp['company'] ?: 'Nama Perusahaan' }} | {{ $exp['location'] ?: 'Lokasi' }}
                        </div>
                        @if(!empty($exp['description']))
                        <div style="margin-top: 4px;">
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
                    <h2 style="font-size: 12pt; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #333; margin: 0 0 15px 0; padding-bottom: 2px;">
                        {{ $labels['education'] ?? 'Education' }}
                    </h2>
                    @forelse($data['education'] as $edu)
                    <div style="margin-bottom: 10px;">
                        <div style="display: flex; justify-content: space-between; font-weight: bold;">
                            <span>{{ $edu['school'] ?: 'Nama Institusi' }} @if(!empty($edu['location'])) | {{ $edu['location'] }} @endif</span>
                            <span>{{ $edu['period'] ?: 'Periode' }}</span>
                        </div>
                        <div>{{ $edu['degree'] ?: 'Gelar / Jurusan' }}</div>
                        @if(!empty($edu['description']))
                        <div style="margin-top: 3px; font-size: 10pt; font-style: italic;">
                            {!! nl2br(e($edu['description'])) !!}
                        </div>
                        @endif
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #666; font-style: italic;">{{ $labels['no_edu'] ?? 'Belum ada pendidikan yang diisi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'organizations')
                <!-- Organizations -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #333; margin: 0 0 15px 0; padding-bottom: 2px;">
                        {{ $labels['organization'] ?? 'Organizations' }}
                    </h2>
                    @forelse($data['organizations'] as $org)
                    <div style="margin-bottom: 10px;">
                        <div style="display: flex; justify-content: space-between; font-weight: bold;">
                            <span>{{ $org['name'] ?: 'Nama Organisasi' }}</span>
                            <span>{{ $org['period'] ?: 'Periode' }}</span>
                        </div>
                        <div>{{ $org['position'] ?: 'Jabatan' }}</div>
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #666; font-style: italic;">{{ $labels['no_org'] ?? 'Belum ada riwayat organisasi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'projects')
                <!-- Projects -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #333; margin: 0 0 15px 0; padding-bottom: 2px;">
                        {{ $labels['projects'] ?? 'Projects' }}
                    </h2>
                    @forelse($data['projects'] as $proj)
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: bold;">
                            {{ $proj['name'] ?: 'Nama Proyek' }}
                            @if(!empty($proj['link'])) <span style="font-weight: normal; color: #000000; font-size: 10pt;">| {{ str_replace('https://', '', $proj['link']) }}</span> @endif
                        </div>
                        <div style="margin-top: 3px;">{!! nl2br(e($proj['description'])) !!}</div>
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #666; font-style: italic;">{{ $labels['no_projects'] ?? 'Belum ada proyek yang diisi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'certifications')
                <!-- Certifications -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #333; margin: 0 0 15px 0; padding-bottom: 2px;">
                        Sertifikasi & Pelatihan
                    </h2>
                    @forelse($data['certifications'] as $cert)
                    <div style="margin-bottom: 10px;">
                        <div style="display: flex; justify-content: space-between; align-items: baseline;">
                            <div style="font-weight: bold;">{{ $cert['name'] ?: 'Nama Sertifikasi' }}</div>
                            <div style="font-size: 10pt;">{{ $cert['date'] ?: 'Tanggal' }}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: baseline; margin-top: 2px;">
                            <div>{{ $cert['issuer'] ?: 'Penerbit' }}</div>
                            @if(!empty($cert['link']))
                                <div style="font-size: 9pt;">{{ str_replace(['https://', 'http://'], '', $cert['link']) }}</div>
                            @endif
                        </div>
                        @if(!empty($cert['description']))
                            <div style="margin-top: 3px;">{!! nl2br(e($cert['description'])) !!}</div>
                        @endif
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #666; font-style: italic;">Belum ada sertifikasi yang diisi.</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'skills')
                <!-- Skills -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #333; margin: 0 0 15px 0; padding-bottom: 2px;">
                        {{ $labels['skills'] ?? 'Skills' }}
                    </h2>
                    <div style="line-height: 1.6;">
                        {{ implode(', ', array_filter($data['skills'])) ?: 'Keahlian belum diisi.' }}
                    </div>
                </div>
            @endif

            @if($section === 'languages')
                <!-- Languages -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #333; margin: 0 0 15px 0; padding-bottom: 2px;">
                        {{ $labels['languages'] ?? 'Languages' }}
                    </h2>
                    <div style="line-height: 1.6;">
                        @forelse($data['languages'] as $index => $lang)
                            {{ $lang['name'] ?: 'Bahasa' }} @if(!empty($lang['level'])) ({{ $lang['level'] }})@endif @if(!$loop->last), @endif
                        @empty
                            <span style="font-size: 10pt; color: #666; font-style: italic;">Bahasa belum diisi.</span>
                        @endforelse
                    </div>
                </div>
            @endif
        @endforeach

    </div>
</div>
