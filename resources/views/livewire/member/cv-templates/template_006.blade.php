<div style="background: #ffffff; min-height: 297mm; color: #000000 !important; font-family: Arial, sans-serif;">
    <table cellpadding="0" cellspacing="0" style="width: 100%; height: 100%; min-height: 297mm; border-collapse: collapse;">
        <tr style="height: 100%;">
            <!-- Sidebar (Green Solid) -->
            <td style="width: 30%; height: 100%; background-color: #4A7C2C; padding: 40px 25px; vertical-align: top; color: #ffffff !important;">
                <!-- Photo -->
                @if($photo || $data['photo_path'])
                    <div style="width: 150px; height: 150px; margin: 0 auto 30px auto; overflow: hidden; background-color: #f8fafc;">
                        <img src="{{ $photo ? $photo->temporaryUrl() : asset('storage/' . $data['photo_path']) }}" style="width: 100%; height: 100%; object-cover: cover;">
                    </div>
                @endif

                <!-- Contact Info -->
                <div style="margin-bottom: 40px;">
                    <h3 style="font-size: 14px; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid rgba(255,255,255,0.3); padding-bottom: 10px; margin-bottom: 20px; color: #ffffff !important;">{{ $labels['contact'] ?? 'Kontak' }}</h3>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 11px; line-height: 2;">
                        @if(!empty($data['email'])) <li style="color: #ffffff !important;"><i class="fa-solid fa-envelope" style="width: 20px; text-align: center; margin-right: 5px;"></i> {{ $data['email'] }}</li> @endif
                        @if(!empty($data['phone'])) <li style="color: #ffffff !important;"><i class="fa-solid fa-phone" style="width: 20px; text-align: center; margin-right: 5px;"></i> {{ $data['phone'] }}</li> @endif
                        @if(!empty($data['location'])) <li style="color: #ffffff !important;"><i class="fa-solid fa-location-dot" style="width: 20px; text-align: center; margin-right: 5px;"></i> {{ $data['location'] }}</li> @endif
                        @if(!empty($data['linkedin'])) <li style="color: #ffffff !important;"><i class="fa-brands fa-linkedin" style="width: 20px; text-align: center; margin-right: 5px;"></i> {{ str_replace(['https://','linkedin.com/in/'], '', $data['linkedin']) }}</li> @endif
                    </ul>
                </div>

                <!-- Skills -->
                @if(!empty($data['skills']))
                <div style="margin-bottom: 40px;">
                    <h3 style="font-size: 14px; font-weight: bold; text-transform: uppercase; border-bottom: 1px solid rgba(255,255,255,0.3); padding-bottom: 10px; margin-bottom: 20px; color: #ffffff !important;">{{ $labels['skills'] }}</h3>
                    <ul style="list-style: none; padding: 0; margin: 0; font-size: 11px; line-height: 2;">
                        @foreach($data['skills'] as $skill)
                            @if(!empty($skill))
                                <li style="color: #ffffff !important; margin-bottom: 5px;">• {{ $skill }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                @endif
            </td>

            <!-- Main Content Area -->
            <td style="padding: 50px 40px; vertical-align: top;">
                <!-- Name & Headline -->
                <div style="margin-bottom: 40px;">
                    <h1 style="font-size: 32px; font-weight: 800; color: #1e293b !important; text-transform: uppercase; margin: 0 0 5px 0;">{{ $data['full_name'] ?: ($labels['placeholder_name'] ?? 'Your Name') }}</h1>
                    @if(!empty($data['headline']))
                        <p style="font-size: 16px; font-weight: 600; color: #4A7C2C !important; margin: 0;">{{ $data['headline'] }}</p>
                    @endif
                </div>

                <!-- Summary -->
                @if(!empty($data['summary']))
                <div style="margin-bottom: 35px;">
                    <h2 style="font-size: 14px; font-weight: bold; text-transform: uppercase; color: #4A7C2C !important; border-bottom: 2px solid #4A7C2C; padding-bottom: 5px; margin-bottom: 15px;">{{ $labels['summary'] }}</h2>
                    <p style="font-size: 12px; line-height: 1.6; color: #000000 !important; text-align: justify;">{{ $data['summary'] }}</p>
                </div>
                @endif

                <!-- Experience -->
                @if(!empty($data['experience']))
                <div style="margin-bottom: 35px;">
                    <h2 style="font-size: 14px; font-weight: bold; text-transform: uppercase; color: #4A7C2C !important; border-bottom: 2px solid #4A7C2C; padding-bottom: 5px; margin-bottom: 20px;">{{ $labels['experience'] }}</h2>
                    <table style="width: 100%; border-collapse: collapse;">
                        @foreach($data['experience'] as $exp)
                        <tr>
                            <td style="vertical-align: top; padding-bottom: 25px;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="font-size: 13px; font-weight: bold; color: #1e293b !important;">{{ $exp['position'] }}</td>
                                        <td style="text-align: right; font-size: 11px; font-weight: bold; color: #4A7C2C !important;">{{ $exp['period'] }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="font-size: 12px; font-weight: bold; color: #64748b !important; padding: 2px 0 8px 0;">{{ $exp['company'] }} | {{ $exp['location'] }}</td>
                                    </tr>
                                    @if(!empty($exp['description']))
                                    <tr>
                                        <td colspan="2" style="font-size: 11px; line-height: 1.6; color: #334155 !important; text-align: justify;">{!! nl2br(e($exp['description'])) !!}</td>
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
                <div style="margin-bottom: 35px;">
                    <h2 style="font-size: 14px; font-weight: bold; text-transform: uppercase; color: #4A7C2C !important; border-bottom: 2px solid #4A7C2C; padding-bottom: 5px; margin-bottom: 15px;">{{ $labels['education'] }}</h2>
                    <table style="width: 100%; border-collapse: collapse;">
                        @foreach($data['education'] as $edu)
                        <tr>
                            <td style="vertical-align: top; padding-bottom: 15px;">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="font-size: 12px; font-weight: bold; color: #1e293b !important;">{{ $edu['degree'] }}</td>
                                        <td style="text-align: right; font-size: 11px; font-weight: bold; color: #4A7C2C !important;">{{ $edu['period'] }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="font-size: 11px; color: #64748b !important;">{{ $edu['school'] }} | {{ $edu['location'] }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif

                <!-- Languages (Moved to Main for Template 006 style) -->
                @if(!empty($data['languages']))
                <div style="margin-bottom: 35px;">
                    <h2 style="font-size: 14px; font-weight: bold; text-transform: uppercase; color: #4A7C2C !important; border-bottom: 2px solid #4A7C2C; padding-bottom: 5px; margin-bottom: 15px;">{{ $labels['languages'] }}</h2>
                    <table style="width: 100%;">
                        @foreach(array_chunk($data['languages'], 2) as $chunk)
                        <tr>
                            @foreach($chunk as $lang)
                            <td style="width: 50%; padding-bottom: 10px;">
                                <span style="font-size: 12px; font-weight: bold; color: #1e293b !important;">{{ $lang['name'] }}</span>
                                <span style="font-size: 11px; color: #64748b !important; margin-left: 5px;">({{ $lang['level'] }})</span>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </table>
                </div>
                @endif
            </td>
        </tr>
    </table>
</div>
