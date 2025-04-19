<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $table = "settings";
    protected $fillable = ['key', 'value', 'group', 'type', 'description'];

    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();

        if (!$setting) {
            return $default;
        }

        switch ($setting->type) {
            case 'file':
                return $setting->value ? Storage::url($setting->value) : $default;
            case 'json':
                return json_decode($setting->value, true) ?? $default;
            default:
                return $setting->value ?? $default;
        }
    }

    public static function set($key, $value, $type = 'string', $group = 'general', $description = null)
    {
        $data = [
            'key' => $key,
            'type' => $type,
            'group' => $group,
            'description' => $description,
        ];

        if ($type === 'file' && $value instanceof \Illuminate\Http\UploadedFile) {
            $data['value'] = $value->store('settings', 'public');
        } elseif ($type === 'json' && is_array($value)) {
            $data['value'] = json_encode($value);
        } else {
            $data['value'] = $value;
        }

        static::updateOrCreate(['key' => $key], $data);
    }
}