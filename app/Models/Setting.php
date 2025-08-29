<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    protected $table = "settings";
    protected $fillable = ['key', 'value', 'group', 'type', 'description'];

    protected static array $defaults = [
        'hospital_name'   => 'Healing Touch',
        'logo'            => '/healingTouchLogo.jpeg',
        'contact_email'   => 'info@healingtouchpurnea.com',
        'contact_phone'   => '9471659700',
        'whatsapp_number' => '9471659700',
        'address'         => 'Healing Touch Hospital,Hope Chauraha, Rambagh Road, Linebazar, Purnea 854301',
    ];

    public static function get($key, $default = null)
    {
        $setting = static::where('key', $key)->first();

        $value = $setting?->value;
        $type = $setting?->type;

        if (!$value && isset(static::$defaults[$key])) {
            $default = static::$defaults[$key];
        }

        switch ($type) {
            case 'file':
                return $value ? Storage::url($value) : $default;
            case 'json':
                return json_decode($value, true) ?? $default;
            default:
                return $value ?? $default;
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
