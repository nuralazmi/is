<?php
return [
    'id' => config('app.locale') === \App\Enums\LanguagesEnum::TR->value ? \App\Enums\LanguageIdEnum::TR->value : \App\Enums\LanguageIdEnum::EN->value,
];
