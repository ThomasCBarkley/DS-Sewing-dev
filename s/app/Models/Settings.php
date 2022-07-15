<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Settings extends Model
{
    use HasFactory;

    public static function getSetting($key, $encrypted = false)
    {
        $value = self::where('setting_key', $key)->value('setting_value');
        if ($encrypted) {
            $value = Crypt::decryptString($value);
        }

        return $value;
    }
}
