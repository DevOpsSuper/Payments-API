<?php

namespace App\Traits\Support;

use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid(): void
    {
        static::creating(function ($model) {
            do {
                $uuid = (string) Str::uuid();
                $isUuidExists = self::where('uuid', $uuid)->exists();

            } while (! empty($isUuidExists));

            $model->uuid = $uuid;
        });
    }
}
