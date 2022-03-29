<?php

namespace App\Support\Str;

use Illuminate\Support\Str;

class StrSupport
{

    /**
     * @param string $value
     * @param string $separator
     * @return string
     */
    public static function upperSnake(string $value, string $separator = '_'): string
    {
        return Str::upper(Str::slug($value, $separator));
    }
}
