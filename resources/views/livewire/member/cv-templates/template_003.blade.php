<!-- Template: Professional Academic (Olive Green) -->
<div style="background: #ffffff; min-height: 297mm; color: #000000; font-family: Arial, Helvetica, sans-serif;">
    <!-- Header Section -->
    <table cellpadding="0" cellspacing="0" style="width: 100%; border-collapse: collapse; background-color: #5B8C31; color: #ffffff;">
        <tr>
            <td style="padding: 10mm 15mm; vertical-align: middle;">
                <table cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tr>
                        <!-- Photo Column -->
                        @if($photo || $data['photo_path'])
                        <td style="width: 140px; padding-right: 30px; vertical-align: top;">
                            <div style="width: 130px; height: 130px; border: 4px solid #ffffff; background-color: #ffffff; overflow: hidden; border-radius: 4px;">
                                <img src="{{ $photo ? $photo->temporaryUrl() : asset('storage/' . $data['photo_path']) }}" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                            </div>
                        </td>
                        @endif

                        <!-- Basics Column -->
                        <td style="vertical-align: middle;">
                            <h1 style="font-size: 32px; font-weight: bold; margin: 0 0 10px 0; line-height: 1.2; text-transform: uppercase;">{{ $data['full_name'] ?: ($labels['placeholder_name'] ?? 'Your Name') }}</h1>
                            <div style="font-size: 13px; line-height: 1.5; opacity: 0.9;">
                                <div style="margin-bottom: 3px;">
                                    <span>{{ $data['email'] ?: ($labels['placeholder_email'] ?? 'email@example.com') }}</span>
                                    <span style="margin: 0 8px;">|</span>
                                    <span>{{ $data['phone'] ?: ($labels['placeholder_phone'] ?? '08123456789') }}</span>
                                </div>
                                <div style="margin-bottom: 3px;">
                                    @if(!empty($data['linkedin'])) <span>{{ str_replace(['https://','linkedin.com/in/'], '', $data['linkedin']) }}</span> @endif
                                    @if(!empty($data['linkedin']) && !empty($data['website'])) <span style="margin: 0 8px;">|</span> @endif
                                    @if(!empty($data['website'])) <span>{{ str_replace(['https://','http://'], '', $data['website']) }}</span> @endif
                                </div>
                                <div style="text-transform: uppercase; letter-spacing: 1px; font-weight: bold; margin-top: 5px;">
                                    {{ $data['location'] ?: ($data['language'] === 'en' ? 'City, Country' : 'Kota, Negara') }}
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Content Section -->
    <div style="padding: 10mm 15mm;">
        
        <!-- Summary -->
        @if(!empty($data['summary']))
        <div style="margin-bottom: 30px;">
            <div style="background-color: #5B8C31; color: #ffffff; padding: 6px 12px; font-weight: bold; text-transform: uppercase; font-size: 14px; margin-bottom: 12px; display: inline-block; min-width: 100%; box-sizing: border-box;">
                {{ $labels['summary'] ?? 'Ringkasan Profil' }}
            </div>
            <p style="font-size: 12px; line-height: 1.6; text-align: justify; margin: 0;">{{ $data['summary'] }}</p>
        </div>
        @endif

        <!-- Experience -->
        @if(!empty($data['experience']))
        <div style="margin-bottom: 30px;">
            <div style="background-color: #5B8C31; color: #ffffff; padding: 6px 12px; font-weight: bold; text-transform: uppercase; font-size: 14px; margin-bottom: 15px; display: inline-block; min-width: 100%; box-sizing: border-box;">
                {{ $labels['experience'] ?? 'Pengalaman Kerja' }}
            </div>
            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                @foreach($data['experience'] as $exp)
                <tr>
                    <td style="padding-bottom: 20px;">
                        <table cellpadding="0" cellspacing="0" style="width: 100%;">
                            <tr>
                                <td style="font-weight: bold; font-size: 13px; color: #000;">{{ $exp['company'] }}</td>
                                <td style="text-align: right; font-weight: bold; font-size: 12px; color: #5B8C31;">{{ $exp['period'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 12px; font-weight: bold; color: #555; padding-top: 2px;">{{ $exp['position'] }} <span style="font-weight: normal; color: #888;">| {{ $exp['location'] }}</span></td>
                            </tr>
                            @if(!empty($exp['description']))
                            <tr>
                                <td colspan="2" style="padding-top: 6px; font-size: 12px; line-height: 1.5; text-align: justify; color: #333;">{!! nl2br(e($exp['description'])) !!}</td>
                            </tr>
                            @endif
                        </table>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        @endif

        <!-- Education -->
        @if(!empty($data['education']))
        <div style="margin-bottom: 30px;">
            <div style="background-color: #5B8C31; color: #ffffff; padding: 6px 12px; font-weight: bold; text-transform: uppercase; font-size: 14px; margin-bottom: 15px; display: inline-block; min-width: 100%; box-sizing: border-box;">
                {{ $labels['education'] ?? 'Pendidikan' }}
            </div>
            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                @foreach($data['education'] as $edu)
                <tr>
                    <td style="padding-bottom: 15px;">
                        <table cellpadding="0" cellspacing="0" style="width: 100%;">
                            <tr>
                                <td style="font-weight: bold; font-size: 13px; color: #000;">{{ $edu['school'] }}</td>
                                <td style="text-align: right; font-weight: bold; font-size: 12px; color: #5B8C31;">{{ $edu['period'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 12px; color: #555; padding-top: 2px;">{{ $edu['degree'] }} <span style="color: #888;">| {{ $edu['location'] }}</span></td>
                            </tr>
                            @if(!empty($edu['description']))
                            <tr>
                                <td colspan="2" style="padding-top: 4px; font-size: 11px; font-style: italic; color: #666;">{!! nl2br(e($edu['description'])) !!}</td>
                            </tr>
                            @endif
                        </table>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        @endif

        <!-- Two Column Section: Skills & Organizations/Projects -->
        <table cellpadding="0" cellspacing="0" style="width: 100%;">
            <tr>
                <!-- Left Column -->
                <td style="width: 48%; vertical-align: top; padding-right: 2%;">
                    @if(!empty($data['skills']))
                    <div style="margin-bottom: 25px;">
                        <div style="background-color: #5B8C31; color: #ffffff; padding: 6px 12px; font-weight: bold; text-transform: uppercase; font-size: 14px; margin-bottom: 12px; display: inline-block; min-width: 100%; box-sizing: border-box;">
                            {{ $labels['skills'] ?? 'Keahlian' }}
                        </div>
                        <ul style="margin: 0; padding-left: 18px; font-size: 12px; line-height: 1.6;">
                            @foreach(array_filter($data['skills']) as $skill)
                                <li>{{ $skill }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if(!empty($data['languages']))
                    <div style="margin-bottom: 25px;">
                        <div style="background-color: #5B8C31; color: #ffffff; padding: 6px 12px; font-weight: bold; text-transform: uppercase; font-size: 14px; margin-bottom: 12px; display: inline-block; min-width: 100%; box-sizing: border-box;">
                            {{ $labels['languages'] ?? 'Bahasa' }}
                        </div>
                        <ul style="margin: 0; padding-left: 18px; font-size: 12px; line-height: 1.6;">
                            @foreach($data['languages'] as $lang)
                                <li><strong>{{ $lang['name'] }}</strong> @if(!empty($lang['level']))- {{ $lang['level'] }}@endif</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </td>

                <!-- Right Column -->
                <td style="width: 48%; vertical-align: top; padding-left: 2%;">
                    @if(!empty($data['projects']))
                    <div style="margin-bottom: 25px;">
                         <div style="background-color: #5B8C31; color: #ffffff; padding: 6px 12px; font-weight: bold; text-transform: uppercase; font-size: 14px; margin-bottom: 12px; display: inline-block; min-width: 100%; box-sizing: border-box;">
                            {{ $labels['projects'] ?? 'Proyek' }}
                        </div>
                        @foreach($data['projects'] as $proj)
                        <div style="margin-bottom: 12px;">
                            <div style="font-weight: bold; font-size: 12px;">{{ $proj['name'] }}</div>
                             <div style="font-size: 11px; text-decoration: underline; color: #5B8C31;">{{ $proj['link'] }}</div>
                            <div style="font-size: 11px; line-height: 1.4; color: #444; margin-top: 2px;">{!! nl2br(e($proj['description'])) !!}</div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </td>
            </tr>
        </table>

    </div>
</div>
