<div class="{{ in_array($template, ['elegant', 'modern']) ? 'text-left' : 'text-center' }} {{ $template === 'elegant' ? 'border-l-8 border-slate-900 pl-6' : '' }} {{ $template === 'modern' ? 'border-b-2 border-blue-600 pb-4' : '' }} mb-8">
    <h1 class="text-3xl font-bold uppercase tracking-wide mb-2 {{ $template === 'modern' ? 'text-blue-700' : '' }}">
        {{ $data['full_name'] ?: $labels['placeholder_name'] }}
    </h1>
    <p class="text-sm {{ $template === 'modern' ? 'text-slate-600' : '' }}">
        {{ $data['email'] ?: $labels['placeholder_email'] }} | 
        {{ $data['phone'] ?: $labels['placeholder_phone'] }}
        @if(!empty($data['linkedin'])) | {{ $data['linkedin'] }} @endif
        @if(!empty($data['website'])) | {{ $data['website'] }} @endif
        | {{ $data['location'] ?: ($data['language'] === 'en' ? 'City, Country' : 'Kota, Negara') }}
    </p>
</div>
