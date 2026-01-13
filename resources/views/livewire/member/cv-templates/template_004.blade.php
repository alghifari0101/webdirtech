<!-- Template: Standard 04 (Classic) -->
<div style="background: #ffffff; min-height: 297mm; color: #000000; font-family: Arial, Helvetica, sans-serif;">
    <!-- Header Section -->
    <div style="text-align: center; padding-top: 40px; padding-bottom: 30px; border-bottom: 2px solid #000000; margin: 0 40px 30px 40px;">
        <h1 style="font-size: 32px; font-weight: bold; text-transform: uppercase; margin: 0 0 5px 0;">{{ $data['full_name'] ?: ($labels['placeholder_name'] ?? 'Full Name') }}</h1>
        @if(!empty($data['headline']))
            <p style="font-size: 14px; font-weight: bold; margin: 0 0 10px 0;">{{ $data['headline'] }}</p>
        @endif
        <p style="font-size: 12px; margin: 0;">
            {{ $data['location'] }} <span style="margin: 0 5px;">|</span> {{ $data['email'] }} <span style="margin: 0 5px;">|</span> {{ $data['phone'] }}
            @if(!empty($data['linkedin'])) <span style="margin: 0 5px;">|</span> {{ str_replace(['https://', 'http://'], '', $data['linkedin']) }} @endif
        </p>
    </div>

    <!-- Content -->
    <div style="padding: 0 40px;">
        
        <!-- Summary -->
        @if(!empty($data['summary']))
        <div style="margin-bottom: 30px;">
            <div style="font-size: 16px; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #000000; padding-bottom: 5px; margin-bottom: 10px;">{{ $labels['summary'] ?? 'Ringkasan Profil' }}</div>
            <p style="font-size: 12px; line-height: 1.6; text-align: justify; margin: 0;">{{ $data['summary'] }}</p>
        </div>
        @endif

        <!-- Experience -->
        @if(!empty($data['experience']))
        <div style="margin-bottom: 30px;">
            <div style="font-size: 16px; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #000000; padding-bottom: 5px; margin-bottom: 15px;">{{ $labels['experience'] ?? 'Pengalaman Kerja' }}</div>
            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                @foreach($data['experience'] as $exp)
                <tr>
                    <td style="padding-bottom: 20px;">
                        <table cellpadding="0" cellspacing="0" style="width: 100%;">
                            <tr>
                                <td style="font-weight: bold; font-size: 13px;">{{ $exp['position'] }}</td>
                                <td style="text-align: right; font-weight: bold; font-size: 12px;">{{ $exp['period'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 12px; font-style: italic; padding-bottom: 5px;">{{ $exp['company'] }}, {{ $exp['location'] }}</td>
                            </tr>
                            @if(!empty($exp['description']))
                            <tr>
                                <td colspan="2" style="font-size: 12px; line-height: 1.5; text-align: justify;">{!! nl2br(e($exp['description'])) !!}</td>
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
            <div style="font-size: 16px; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #000000; padding-bottom: 5px; margin-bottom: 15px;">{{ $labels['education'] ?? 'Pendidikan' }}</div>
            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                @foreach($data['education'] as $edu)
                <tr>
                    <td style="padding-bottom: 15px;">
                        <table cellpadding="0" cellspacing="0" style="width: 100%;">
                            <tr>
                                <td style="font-weight: bold; font-size: 13px;">{{ $edu['school'] }}</td>
                                <td style="text-align: right; font-weight: bold; font-size: 12px;">{{ $edu['period'] }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="font-size: 12px; font-style: italic;">{{ $edu['degree'] }}, {{ $edu['location'] }}</td>
                            </tr>
                            @if(!empty($edu['description']))
                            <tr>
                                <td colspan="2" style="padding-top: 3px; font-size: 12px;">{!! nl2br(e($edu['description'])) !!}</td>
                            </tr>
                            @endif
                        </table>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        @endif

        <!-- Skills -->
        @if(!empty($data['skills']))
        <div style="margin-bottom: 30px;">
            <div style="font-size: 16px; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #000000; padding-bottom: 5px; margin-bottom: 10px;">{{ $labels['skills'] ?? 'Keahlian' }}</div>
            <p style="font-size: 12px; line-height: 1.6; margin: 0;">• {{ implode('   •   ', array_filter($data['skills'])) }}</p>
        </div>
        @endif

        <!-- Projects -->
        @if(!empty($data['projects']))
        <div style="margin-bottom: 30px;">
            <div style="font-size: 16px; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid #000000; padding-bottom: 5px; margin-bottom: 15px;">{{ $labels['projects'] ?? 'Proyek' }}</div>
            <table cellpadding="0" cellspacing="0" style="width: 100%;">
                @foreach($data['projects'] as $proj)
                <tr>
                    <td style="padding-bottom: 15px;">
                        <table cellpadding="0" cellspacing="0" style="width: 100%;">
                            <tr>
                                <td style="font-weight: bold; font-size: 13px;">{{ $proj['name'] }}</td>
                                <td style="text-align: right; font-size: 12px;">{{ $proj['period'] }}</td>
                            </tr>
                             @if(!empty($proj['link']))
                            <tr>
                                <td colspan="2" style="font-size: 11px; font-style: italic;">{{ $proj['link'] }}</td>
                            </tr>
                            @endif
                            <tr>
                                <td colspan="2" style="font-size: 12px; line-height: 1.5; text-align: justify; padding-top: 3px;">{!! nl2br(e($proj['description'])) !!}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        @endif

    </div>
</div>
