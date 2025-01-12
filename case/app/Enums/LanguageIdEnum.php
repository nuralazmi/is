<?php

namespace App\Enums;

enum LanguageIdEnum: int
{
    case TR = 1;
    case EN = 2;

    public function code(): string
    {
        return strtolower($this->name);
    }

}
