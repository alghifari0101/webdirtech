<!-- Template: Medical 07 (Clean) -->
<div style="background: #ffffff; min-height: 297mm; color: #334155; font-family: Arial, sans-serif;">
    <!-- Header -->
    <table cellpadding="0" cellspacing="0" style="width: 100%; border-bottom: 1px solid #cbd5e1;">
        <tr>
            <td style="padding: 40px 40px 20px 40px;">
                <h1 style="font-size: 32px; font-weight: bold; color: #1e293b; margin: 0 0 5px 0;">{{ $data['full_name'] ?: ($labels['placeholder_name'] ?? 'Full Name') }}</h1>
                <p style="font-size: 16px; color: #64748b; margin: 0 0 15px 0;">{{ $data['headline'] ?? '' }}</p>
                
                @if($data['summary'])
                <p style="font-size: 12px; line-height: 1.6; color: #475569; text-align: justify; margin: 0 0 20px 0;">{{ $data['summary'] }}</p>
                @endif

                <!-- Contact Grid (simulated with table) -->
                <table cellpadding="0" cellspacing="0" style="width: 100%; border-top: 1px solid #e2e8f0; padding-top: 15px;">
                    <tr>
                        <td style="font-size: 11px; font-weight: bold; color: #334155; padding-right: 15px;">
                            <i class="fa-solid fa-envelope" style="color: #94a3b8; margin-right: 5px;"></i> {{ $data['email'] }}
                        </td>
                        <td style="font-size: 11px; font-weight: bold; color: #334155; padding-right: 15px;">
                            <i class="fa-solid fa-phone" style="color: #94a3b8; margin-right: 5px;"></i> {{ $data['phone'] }}
                        </td>
                        <td style="font-size: 11px; font-weight: bold; color: #334155; padding-right: 15px;">
                             <i class="fa-solid fa-location-dot" style="color: #94a3b8; margin-right: 5px;"></i> {{ $data['location'] }}
                        </td>
                        @if(!empty($data['linkedin']))
                        <td style="font-size: 11px; font-weight: bold; color: #334155;">
                            <i class="fa-brands fa-linkedin" style="color: #94a3b8; margin-right: 5px;"></i> {{ str_replace(['https://','linkedin.com/in/'], '', $data['linkedin']) }}
                        </td>
                        @endif
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Main Content Table -->
    <table cellpadding="0" cellspacing="0" style="width: 100%;">
        <tr>
            <!-- Left Main Content (62%) -->
            <td style="width: 62%; vertical-align: top; padding: 30px 20px 30px 40px;">
                
                @if(!empty($data['experience']))
                <div style="margin-bottom: 30px;">
                    <h2 style="font-size: 14px; font-weight: bold; text-transform: uppercase; color: #1e293b; letter-spacing: 2px; margin-bottom: 20px; border-bottom: 2px solid #e2e8f0; padding-bottom: 5px;">{{ $labels['experience'] ?? 'Riwayat Kerja' }}</h2>
                    <table cellpadding="0" cellspacing="0" style="width: 100%;">
                        @foreach($data['experience'] as $exp)
                        <tr>
                            <td style="padding-left: 15px; border-left: 2px solid #f1f5f9; position: relative; padding-bottom: 25px;">
                                <!-- Dot simulator -->
                                <div style="position: absolute; left: -5px; top: 5px; width: 8px; height: 8px; border-radius: 50%; background-color: #cbd5e1;"></div>
                                
                                <div style="font-size: 13px; font-weight: bold; color: #0f172a; margin-bottom: 3px;">{{ $exp['position'] }}</div>
                                <div style="font-size: 11px; font-weight: bold; color: #64748b; margin-bottom: 5px;">{{ $exp['company'] }} | {{ $exp['location'] }}</div>
                                <div style="font-size: 10px; font-weight: bold; color: #94a3b8; font-style: italic; margin-bottom: 8px;">{{ $exp['period'] }}</div>
                                @if(!empty($exp['description']))
                                <div style="font-size: 12px; line-height: 1.6; color: #334155; text-align: justify;">
                                    {!! nl2br(e($exp['description'])) !!}
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif
            </td>

            <!-- Right Sidebar (38%) -->
            <td style="width: 38%; vertical-align: top; padding: 30px 40px 30px 20px;">
                
                @if(!empty($data['skills']))
                <div style="margin-bottom: 30px;">
                    <h2 style="font-size: 12px; font-weight: bold; text-transform: uppercase; color: #1e293b; letter-spacing: 1px; margin-bottom: 15px; border-bottom: 1px solid #e2e8f0; padding-bottom: 5px;">{{ $labels['skills'] ?? 'Keahlian' }}</h2>
                    <table cellpadding="0" cellspacing="0" style="width: 100%;">
                        @foreach($data['skills'] as $skill)
                            @if(!empty($skill))
                            <tr>
                                <td style="padding-bottom: 8px; font-size: 12px; color: #475569; border-bottom: 1px dashed #f1f5f9;">{{ $skill }}</td>
                            </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
                @endif

                @if(!empty($data['education']))
                <div style="margin-bottom: 30px;">
                    <h2 style="font-size: 12px; font-weight: bold; text-transform: uppercase; color: #1e293b; letter-spacing: 1px; margin-bottom: 15px; border-bottom: 1px solid #e2e8f0; padding-bottom: 5px;">{{ $labels['education'] ?? 'Pendidikan' }}</h2>
                    <table cellpadding="0" cellspacing="0" style="width: 100%;">
                        @foreach($data['education'] as $edu)
                        <tr>
                            <td style="padding-bottom: 15px;">
                                <div style="font-size: 12px; font-weight: bold; color: #334155;">{{ $edu['degree'] }}</div>
                                <div style="font-size: 11px; color: #64748b;">{{ $edu['school'] }}</div>
                                <div style="font-size: 10px; color: #94a3b8;">{{ $edu['period'] }}</div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif

            </td>
        </tr>
    </table>
</div>
