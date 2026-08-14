@php($logo =url("landing/images/basic/logo.png"))
@php($logo =url("portal_/images/logoportal.png"))
@php($logo = url(\Config::get('logos.logoh350')))
@php

    if(\Config::get('app.env')== 'local'){
    $yte = App\Model\Stud::find(1);
    $linkbaner =  route('MyPageBase', ['slug'=>$yte->slug]);
    }else{
    $yte = App\Model\Stud::find(6);
    $linkbaner =  route('MyPageBase', ['slug'=>$yte->slug]);
    }

@endphp

@php($baner = url('portal_/images/banner-1.png'))
@php($baner = url('portal_/images/pereira1.jpg'))

<a href="{!! $linkbaner !!}" target="_blank">
    <figure class="banner-dd ">
        <img class="img-responsive " src="{!! $baner !!}" alt="" >
    </figure>
</a>
