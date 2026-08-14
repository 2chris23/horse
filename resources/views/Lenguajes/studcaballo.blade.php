{{--
https://developers.facebook.com/tools/debug/
https://cards-dev.twitter.com/validator
https://developers.pinterest.com/rich_pins/validator/
https://developers.google.com/structured-data/testing-tool/

--}}
<?php
$lngalterno = '';
$lsd = '';
foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
    $lngalterno .= "<link rel=\"alternate\" hreflang=\"$localeCode\" href=\"" . LaravelLocalization::getLocalizedURL($localeCode, null, [], true) . "\" />";
    $lsd .= "$localeCode,";
}
?>
<ul>
    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li>
            <a rel="alternate" hreflang="{{ $localeCode }}"
               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
    @endforeach
</ul>



