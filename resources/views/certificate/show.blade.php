@php
    $d_length = strlen($certificate->description);
    $ci_mt = 14;
    if($d_length>610) {
        $ci_mt = 4;
    }

    $template = 'show';
    switch ($certificate->category_id) {
        case 1:
            @endphp
                 @include('certificate/designs/sotm_'.$template)
            @php
            break;
        case 3:
            @endphp
            @include('certificate/designs/challenge_'.$template)
            @php
            break;
        default:
            @endphp
                @include('certificate/designs/sotm_'.$template)
            @php
    }

@endphp


