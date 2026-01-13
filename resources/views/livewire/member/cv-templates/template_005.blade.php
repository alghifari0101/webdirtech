<!-- Template: Two-Col 05 (Modern Split) -->
<div style="background: #ffffff; min-height: 297mm; color: #334155; font-family: Arial, sans-serif;">
    <!-- Header -->
    <table cellpadding="0" cellspacing="0" style="width: 100%; border-bottom: 1px solid #e2e8f0;">
        <tr>
            <td style="padding: 30px 40px;">
                <table cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tr>
                        @if($data['photo_path'])
                        <td style="width: 140px; vertical-align: middle; padding-right: 30px;">
                            <div style="width: 120px; height: 120px; border-radius: 50%; border: 4px solid #f1f5f9; overflow: hidden; background-color: #f8fafc;">
                                <img src="{{ asset('storage/' . $data['photo_path']) }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        </td>
                        @endif
                        <td style="vertical-align: middle;">
                            <h1 style="font-size: 32px; font-weight: bold; color: #2563EB; margin: 0 0 5px 0;">{{ $data['full_name'] ?: 'Full Name' }}</h1>
                            <p style="font-size: 14px; color: #64748b; margin: 0 0 10px 0;">{{ $data['location'] }}</p>
                            <table cellpadding="0" cellspacing="0" style="font-size: 12px; font-weight: bold; color: #475569;">
                                <tr>
                                    <td style="padding-right: 20px;"><i class="fa-solid fa-phone" style="margin-right: 5px;"></i> {{ $data['phone'] }}</td>
                                    <td><i class="fa-solid fa-envelope" style="margin-right: 5px;"></i> {{ $data['email'] }}</td>
                                </tr>
                                 @if(!empty($data['linkedin']) || !empty($data['website']))
                                <tr>
                                    @if(!empty($data['linkedin']))
                                    <td style="padding-right: 20px; padding-top: 5px;"><i class="fa-brands fa-linkedin" style="margin-right: 5px;"></i> {{ str_replace(['https://','linkedin.com/in/'], '', $data['linkedin']) }}</td>
                                    @endif
                                    @if(!empty($data['website']))
                                    <td style="padding-top: 5px;"><i class="fa-solid fa-globe" style="margin-right: 5px;"></i> {{ str_replace(['https://','http://'], '', $data['website']) }}</td>
                                    @endif
                                </tr>
                                @endif
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Main Content Table -->
    <table cellpadding="0" cellspacing="0" style="width: 100%;">
        <tr>
            <!-- Left Sidebar (40%) -->
            <td style="width: 38%; vertical-align: top; padding: 30px 0 30px 40px;">
                
                @if($data['summary'])
                <div style="margin-bottom: 30px;">
                    <div style="font-size: 14px; font-weight: bold; text-transform: uppercase; color: #2563EB; border-bottom: 2px solid #2563EB; padding-bottom: 5px; margin-bottom: 10px;">{{ $labels['summary'] ?? 'Tentang Saya' }}</div>
                    <p style="font-size: 12px; line-height: 1.6; text-align: justify; color: #334155;">{{ $data['summary'] }}</p>
                </div>
                @endif

                @if(!empty($data['skills']))
                <div style="margin-bottom: 30px;">
                    <div style="font-size: 14px; font-weight: bold; text-transform: uppercase; color: #2563EB; border-bottom: 2px solid #2563EB; padding-bottom: 5px; margin-bottom: 10px;">{{ $labels['skills'] ?? 'Keahlian' }}</div>
                    <ul style="margin: 0; padding-left: 0; list-style: none;">
                        @foreach($data['skills'] as $skill)
                            @if(!empty($skill))
                            <li style="font-size: 12px; margin-bottom: 5px; color: #334155;">
                                <span style="color: #2563EB; margin-right: 5px;">•</span> {{ $skill }}
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(!empty($data['languages']))
                <div style="margin-bottom: 30px;">
                    <div style="font-size: 14px; font-weight: bold; text-transform: uppercase; color: #2563EB; border-bottom: 2px solid #2563EB; padding-bottom: 5px; margin-bottom: 10px;">{{ $labels['languages'] ?? 'Bahasa' }}</div>
                    <table cellpadding="0" cellspacing="0" style="width: 100%;">
                        @foreach($data['languages'] as $lang)
                        <tr>
                            <td style="font-size: 12px; font-weight: bold; padding-bottom: 5px;">{{ $lang['name'] }}</td>
                            <td style="font-size: 12px; color: #64748b; text-align: right; padding-bottom: 5px;">{{ $lang['level'] }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif

            </td>

            <!-- Spacer -->
            <td style="width: 4%;"></td>

            <!-- Right Content (58%) -->
            <td style="width: 58%; vertical-align: top; padding: 30px 40px 30px 0;">
                
                @if(!empty($data['experience']))
                <div style="margin-bottom: 30px;">
                    <div style="font-size: 14px; font-weight: bold; text-transform: uppercase; color: #2563EB; border-bottom: 2px solid #2563EB; padding-bottom: 5px; margin-bottom: 15px;">{{ $labels['experience'] ?? 'Pengalaman Kerja' }}</div>
                    <table cellpadding="0" cellspacing="0" style="width: 100%;">
                        @foreach($data['experience'] as $exp)
                        <tr>
                            <td style="padding-bottom: 20px;">
                                <div style="font-size: 13px; font-weight: bold; color: #1e293b; margin-bottom: 2px;">{{ $exp['position'] }}</div>
                                <div style="margin-bottom: 5px;">
                                    <span style="font-size: 12px; font-weight: bold; color: #64748b;">{{ $exp['company'] }}</span>
                                    <span style="font-size: 11px; color: #94a3b8; float: right;">{{ $exp['period'] }}</span>
                                </div>
                                @if(!empty($exp['description']))
                                <div style="font-size: 12px; line-height: 1.5; color: #475569; text-align: justify;">
                                    {!! nl2br(e($exp['description'])) !!}
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif

                @if(!empty($data['education']))
                <div style="margin-bottom: 30px;">
                    <div style="font-size: 14px; font-weight: bold; text-transform: uppercase; color: #2563EB; border-bottom: 2px solid #2563EB; padding-bottom: 5px; margin-bottom: 15px;">{{ $labels['education'] ?? 'Pendidikan' }}</div>
                    <table cellpadding="0" cellspacing="0" style="width: 100%;">
                        @foreach($data['education'] as $edu)
                        <tr>
                            <td style="padding-bottom: 15px;">
                                <div style="font-size: 13px; font-weight: bold; color: #1e293b;">{{ $edu['school'] }}</div>
                                <div style="font-size: 12px; color: #64748b; margin-bottom: 2px;">
                                    {{ $edu['degree'] }} <span style="float: right; font-size: 11px; color: #94a3b8;">{{ $edu['period'] }}</span>
                                </div>
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
