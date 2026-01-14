<!-- Template: CV ATS 001 (Minimalist Blue) -->
<div style="background: #ffffff; min-height: 297mm; color: #000000; font-family: 'Arial', sans-serif; font-size: 11pt; line-height: 1.5;">
    <div style="padding: 0 10mm 15mm 10mm;" class="print:!py-0">
        
        <!-- Header -->
        <div style="border-bottom: 2px solid #2563eb; padding-bottom: 15px; margin-bottom: 20px;">
            <h1 style="font-size: 24pt; font-weight: bold; margin: 0; color: #000000; text-transform: uppercase;">{{ $data['full_name'] ?: ($labels['placeholder_name'] ?? 'Your Name') }}</h1>
            <div style="margin-top: 8px; font-size: 10pt; color: #000000;">
                @if(!empty($data['location'])) <span>{{ $data['location'] }}</span> @endif
                @if(!empty($data['location']) && !empty($data['phone'])) <span style="margin: 0 5px;">|</span> @endif
                <span>{{ $data['phone'] ?: ($labels['placeholder_phone'] ?? '08123456789') }}</span>
                <span style="margin: 0 5px;">|</span>
                <span>{{ $data['email'] ?: ($labels['placeholder_email'] ?? 'email@example.com') }}</span>
                @if(!empty($data['linkedin']))
                    <span style="margin: 0 5px;">|</span>
                    <span>{{ str_replace(['https://','linkedin.com/in/','www.'], '', $data['linkedin']) }}</span>
                @endif
            </div>
        </div>

        @foreach($data['section_order'] as $section)
            @if($section === 'summary')
                <!-- Summary -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; color: #2563eb; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; margin: 0 0 15px 0; padding-bottom: 3px;">
                        {{ $labels['summary'] ?? 'Professional Summary' }}
                    </h2>
                    <p style="margin: 0; text-align: justify;">{{ $data['summary'] ?: 'Tulis ringkasan profil profesional Anda di sini...' }}</p>
                </div>
            @endif

            @if($section === 'experience')
                <!-- Experience -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; color: #2563eb; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; margin: 0 0 15px 0; padding-bottom: 3px;">
                        {{ $labels['experience'] ?? 'Work Experience' }}
                    </h2>
                    @forelse($data['experience'] as $exp)
                    <div style="margin-bottom: 15px;">
                        <div style="display: flex; justify-content: space-between; font-weight: bold; color: #000000;">
                            <span>{{ $exp['position'] ?: 'Posisi Pekerjaan' }}</span>
                            <span>{{ $exp['period'] ?: 'Periode' }}</span>
                        </div>
                        <div style="color: #000000; margin-bottom: 5px;">
                            {{ $exp['company'] ?: 'Nama Perusahaan' }} | {{ $exp['location'] ?: 'Lokasi' }}
                        </div>
                        @if(!empty($exp['description']))
                        <div style="margin-top: 5px;">
                            {!! nl2br(e($exp['description'])) !!}
                        </div>
                        @endif
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #64748b; font-style: italic;">{{ $labels['no_exp'] ?? 'Belum ada pengalaman yang diisi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'education')
                <!-- Education -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; color: #2563eb; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; margin: 0 0 15px 0; padding-bottom: 3px;">
                        {{ $labels['education'] ?? 'Education' }}
                    </h2>
                    @forelse($data['education'] as $edu)
                    <div style="margin-bottom: 10px;">
                        <div style="display: flex; justify-content: space-between; font-weight: bold; color: #000000;">
                            <span>{{ $edu['school'] ?: 'Nama Institusi' }} @if(!empty($edu['location'])) | {{ $edu['location'] }} @endif</span>
                            <span>{{ $edu['period'] ?: 'Periode' }}</span>
                        </div>
                        <div>{{ $edu['degree'] ?: 'Gelar / Jurusan' }}</div>
                        @if(!empty($edu['description']))
                        <div style="margin-top: 3px; font-size: 10pt; color: #000000;">
                            {!! nl2br(e($edu['description'])) !!}
                        </div>
                        @endif
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #64748b; font-style: italic;">{{ $labels['no_edu'] ?? 'Belum ada pendidikan yang diisi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'organizations')
                <!-- Organizations -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; color: #2563eb; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; margin: 0 0 15px 0; padding-bottom: 3px;">
                        {{ $labels['organization'] ?? 'Organizations' }}
                    </h2>
                    @forelse($data['organizations'] as $org)
                    <div style="margin-bottom: 10px;">
                        <div style="display: flex; justify-content: space-between; font-weight: bold; color: #000000;">
                            <span>{{ $org['name'] ?: 'Nama Organisasi' }}</span>
                            <span>{{ $org['period'] ?: 'Periode' }}</span>
                        </div>
                        <div style="color: #000000;">{{ $org['position'] ?: 'Jabatan' }}</div>
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #64748b; font-style: italic;">{{ $labels['no_org'] ?? 'Belum ada riwayat organisasi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'projects')
                <!-- Projects -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; color: #2563eb; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; margin: 0 0 15px 0; padding-bottom: 3px;">
                        {{ $labels['projects'] ?? 'Projects' }}
                    </h2>
                    @forelse($data['projects'] as $proj)
                    <div style="margin-bottom: 10px;">
                        <div style="font-weight: bold; color: #000000;">
                            {{ $proj['name'] ?: 'Nama Proyek' }}
                            @if(!empty($proj['link'])) <span style="font-weight: normal; color: #2563eb; font-size: 10pt;">| {{ str_replace('https://', '', $proj['link']) }}</span> @endif
                        </div>
                        <div style="margin-top: 3px; color: #000000;">{!! nl2br(e($proj['description'])) !!}</div>
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #64748b; font-style: italic;">{{ $labels['no_projects'] ?? 'Belum ada proyek yang diisi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'certifications')
                <!-- Certifications -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; color: #2563eb; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; margin: 0 0 15px 0; padding-bottom: 3px;">
                        Sertifikasi & Pelatihan
                    </h2>
                    @forelse($data['certifications'] as $cert)
                    <div style="margin-bottom: 10px;">
                        <div style="display: flex; justify-content: space-between; align-items: baseline;">
                            <div style="font-weight: bold; color: #000000;">{{ $cert['name'] ?: 'Nama Sertifikasi' }}</div>
                            <div style="font-size: 10pt; color: #000000;">{{ $cert['date'] ?: 'Tanggal' }}</div>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: baseline; margin-top: 2px;">
                            <div style="color: #000000;">{{ $cert['issuer'] ?: 'Penerbit / Penyelenggara' }}</div>
                            @if(!empty($cert['link']))
                                <div style="font-size: 9pt; color: #2563eb;">{{ str_replace(['https://', 'http://'], '', $cert['link']) }}</div>
                            @endif
                        </div>
                        @if(!empty($cert['description']))
                            <div style="margin-top: 3px; color: #000000;">{!! nl2br(e($cert['description'])) !!}</div>
                        @endif
                    </div>
                    @empty
                        <div style="font-size: 10pt; color: #64748b; font-style: italic;">Belum ada sertifikasi yang diisi.</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'skills')
                <!-- Skills -->
                <div style="margin-bottom: 20px;">
                    <h2 style="font-size: 12pt; font-weight: bold; color: #2563eb; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; margin: 0 0 15px 0; padding-bottom: 3px;">
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
                    <h2 style="font-size: 12pt; font-weight: bold; color: #2563eb; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; margin: 0 0 15px 0; padding-bottom: 3px;">
                        {{ $labels['languages'] ?? 'Languages' }}
                    </h2>
                    <ul style="margin: 0; padding-left: 20px;">
                        @forelse($data['languages'] as $lang)
                            <li><strong>{{ $lang['name'] ?: 'Bahasa' }}</strong> @if(!empty($lang['level']))- {{ $lang['level'] }}@endif</li>
                        @empty
                            <li style="font-size: 10pt; color: #64748b; font-style: italic;">Bahasa belum diisi.</li>
                        @endforelse
                    </ul>
                </div>
            @endif
        @endforeach

    </div>
</div>
