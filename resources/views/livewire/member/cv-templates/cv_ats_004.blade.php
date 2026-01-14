<!-- Template: CV ATS 004 (Compact Data-Driven) -->
<div style="background: #ffffff; min-height: 297mm; color: #000000; font-family: 'Verdana', sans-serif; font-size: 10pt; line-height: 1.5;">
    <div style="padding: 0 10mm 15mm 10mm;" class="print:!py-0">
        
        <!-- Header -->
        <div style="margin-bottom: 20px;">
            <h1 style="font-size: 18pt; font-weight: bold; margin: 0; color: #000;">{{ $data['full_name'] ?: ($labels['placeholder_name'] ?? 'Your Name') }}</h1>
             <div style="margin-top: 5px; font-size: 9pt;">
                <span>{{ $data['location'] }}</span> <span style="color: #ccc;">|</span>
                <span>{{ $data['email'] ?: ($labels['placeholder_email'] ?? 'email@example.com') }}</span> <span style="color: #ccc;">|</span>
                <span>{{ $data['phone'] ?: ($labels['placeholder_phone'] ?? '08123456789') }}</span> 
                @if(!empty($data['linkedin'])) <span style="color: #ccc;">|</span> <span>{{ str_replace(['https://','linkedin.com/in/','www.'], '', $data['linkedin']) }}</span> @endif
            </div>
        </div>

        <hr style="border: 0; border-top: 1px solid #000; margin: 10px 0 15px 0;">

        @foreach($data['section_order'] as $section)
            @if($section === 'summary')
                <!-- Summary -->
                <div style="margin-bottom: 15px;">
                    <p style="margin: 0; text-align: justify; font-size: 9pt;">{{ $data['summary'] ?: 'Tulis ringkasan profil profesional Anda di sini...' }}</p>
                </div>
            @endif

            @if($section === 'experience')
                <!-- Experience -->
                <div style="margin-bottom: 15px;">
                    <h2 style="font-size: 10pt; font-weight: bold; text-transform: uppercase; margin: 0 0 10px 0; color: #000000;">
                        {{ $labels['experience'] ?? 'Experience' }}
                    </h2>
                    @forelse($data['experience'] as $exp)
                    <div style="margin-bottom: 12px;">
                        <div style="display: flex; justify-content: space-between; font-weight: bold;">
                            <span>{{ $exp['position'] ?: 'Posisi Pekerjaan' }}</span>
                            <span>{{ $exp['period'] ?: 'Periode' }}</span>
                        </div>
                        <div style="font-size: 9pt; font-weight: 600; color: #4b5563;">{{ $exp['company'] ?: 'Nama Perusahaan' }} | {{ $exp['location'] ?: 'Lokasi' }}</div>
                        @if(!empty($exp['description']))
                        <div style="margin-top: 3px; font-size: 9pt;">
                            {!! nl2br(e($exp['description'])) !!}
                        </div>
                        @endif
                    </div>
                    @empty
                        <div style="font-size: 9pt; color: #666; font-style: italic;">{{ $labels['no_exp'] ?? 'Belum ada pengalaman yang diisi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'education')
                <!-- Education -->
                <div style="margin-bottom: 15px;">
                    <h2 style="font-size: 10pt; font-weight: bold; text-transform: uppercase; margin: 0 0 10px 0; color: #000000;">
                        {{ $labels['education'] ?? 'Education' }}
                    </h2>
                    @forelse($data['education'] as $edu)
                    <div style="margin-bottom: 8px;">
                        <div style="display: flex; justify-content: space-between; font-weight: bold;">
                            <span>{{ $edu['school'] ?: 'Nama Institusi' }} @if(!empty($edu['location'])) | {{ $edu['location'] }} @endif</span>
                            <span>{{ $edu['period'] ?: 'Periode' }}</span>
                        </div>
                        <div style="font-size: 9pt;">{{ $edu['degree'] ?: 'Gelar / Jurusan' }}</div>
                    </div>
                    @empty
                        <div style="font-size: 9pt; color: #666; font-style: italic;">{{ $labels['no_edu'] ?? 'Belum ada pendidikan yang diisi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'organizations')
                <!-- Organizations -->
                <div style="margin-bottom: 15px;">
                    <h2 style="font-size: 10pt; font-weight: bold; text-transform: uppercase; margin: 0 0 10px 0; color: #000000;">
                        {{ $labels['organization'] ?? 'Organizations' }}
                    </h2>
                    @forelse($data['organizations'] as $org)
                    <div style="margin-bottom: 8px;">
                        <div style="display: flex; justify-content: space-between; font-weight: bold;">
                            <span>{{ $org['name'] ?: 'Nama Organisasi' }}</span>
                            <span>{{ $org['period'] ?: 'Periode' }}</span>
                        </div>
                        <div style="font-size: 9pt;">{{ $org['position'] ?: 'Jabatan' }}</div>
                    </div>
                    @empty
                        <div style="font-size: 9pt; color: #666; font-style: italic;">{{ $labels['no_org'] ?? 'Belum ada riwayat organisasi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'projects')
                <!-- Projects -->
                <div style="margin-bottom: 15px;">
                    <h2 style="font-size: 10pt; font-weight: bold; text-transform: uppercase; margin: 0 0 10px 0; color: #000000;">
                        {{ $labels['projects'] ?? 'Projects' }}
                    </h2>
                    @forelse($data['projects'] as $proj)
                    <div style="margin-bottom: 8px;">
                        <div style="font-weight: bold; font-size: 9.5pt;">{{ $proj['name'] ?: 'Nama Proyek' }}</div>
                        <div style="font-size: 9pt;">{!! nl2br(e($proj['description'])) !!}</div>
                    </div>
                    @empty
                        <div style="font-size: 9pt; color: #666; font-style: italic;">{{ $labels['no_projects'] ?? 'Belum ada proyek yang diisi.' }}</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'certifications')
                <!-- Certifications -->
                <div style="margin-bottom: 15px;">
                    <h2 style="font-size: 10pt; font-weight: bold; text-transform: uppercase; margin: 0 0 10px 0; color: #000000;">
                        Sertifikasi & Pelatihan
                    </h2>
                    @forelse($data['certifications'] as $cert)
                    <div style="margin-bottom: 8px;">
                        <div style="display: flex; justify-content: space-between; font-weight: bold;">
                            <span>{{ $cert['name'] ?: 'Nama Sertifikasi' }}</span>
                            <span>{{ $cert['date'] ?: 'Tanggal' }}</span>
                        </div>
                        <div style="font-size: 9pt; color: #333;">{{ $cert['issuer'] ?: 'Penerbit' }}</div>
                        @if(!empty($cert['description']))
                            <div style="font-size: 8.5pt; margin-top: 2px;">{!! nl2br(e($cert['description'])) !!}</div>
                        @endif
                    </div>
                    @empty
                        <div style="font-size: 9pt; color: #666; font-style: italic;">Belum ada sertifikasi yang diisi.</div>
                    @endforelse
                </div>
            @endif

            @if($section === 'skills')
                <!-- Skills -->
                <div style="margin-bottom: 15px;">
                    <h2 style="font-size: 10pt; font-weight: bold; text-transform: uppercase; margin: 0 0 5px 0; color: #000000;">
                        {{ $labels['skills'] ?? 'Skills' }}
                    </h2>
                    <div style="font-size: 9pt;">
                        {{ implode(' • ', array_filter($data['skills'])) ?: 'Keahlian belum diisi.' }}
                    </div>
                </div>
            @endif

            @if($section === 'languages')
                <!-- Languages -->
                <div style="margin-bottom: 15px;">
                    <h2 style="font-size: 10pt; font-weight: bold; text-transform: uppercase; margin: 0 0 5px 0; color: #000000;">
                        {{ $labels['languages'] ?? 'Languages' }}
                    </h2>
                    <div style="font-size: 9pt;">
                        @forelse($data['languages'] as $lang)
                            {{ $lang['name'] ?: 'Bahasa' }}@if(!empty($lang['level'])) ({{ $lang['level'] }})@endif @if(!$loop->last) • @endif
                        @empty
                            <span style="font-size: 9pt; color: #666; font-style: italic;">Bahasa belum diisi.</span>
                        @endforelse
                    </div>
                </div>
            @endif
        @endforeach

    </div>
</div>
