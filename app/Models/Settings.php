<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_title',
        'header_color',
        'footer_color',
        'logo',
        'home_banner',
        'socials_links',
        'footer_links',
        'address',
        'email',
        'phone',
    ];

    public static function getSettings()
    {
        return static::first();
    }

    public static function getSocialLinks()
    {
        $settings = static::getSettings();
        if ($settings) {
            return json_decode($settings->socials_links, true);
        }
        return [];
    }
}
