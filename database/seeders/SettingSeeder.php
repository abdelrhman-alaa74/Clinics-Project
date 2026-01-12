<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            //General
            [
                'group' => 'general',
                'key' => 'site_name',
                'value' => 'my website'
            ],
            [
                'group' => 'contact',
                'key' => 'site_email',
                'value' => 'info@example.com'
            ],
            //Theme
            [
                'group' => 'theme',
                'key' => 'primary_color',
                'value' => 'orange'
            ],
            [
                'group' => 'theme',
                'key' => 'dark_mode',
                'value' => '0'
            ],
            //Contact
            [
                'group' => 'contact',
                'key' => 'site_phone',
                'value' => '0123456789'
            ],
            [
                'group' => 'contact',
                'key' => 'location',
                'value' => 'Mansoura , EG'
            ],
            //Social media
            [
                'group' => 'social_media',
                'key' => 'facebook',
                'value' => ''
            ],
            [
                'group' => 'social_media',
                'key' => 'linkedin',
                'value' => ''
            ],
            [
                'group' => 'social_media',
                'key' => 'gmail',
                'value' => ''
            ],
            [
                'group' => 'social_media',
                'key' => 'youtube',
                'value' => ''
            ],
            [
                'group' => 'social_media',
                'key' => 'tiktok',
                'value' => ''
            ],
            [
                'group' => 'social_media',
                'key' => 'twitter',
                'value' => ''
            ],
            [
                'group' => 'social_media',
                'key' => 'instagram',
                'value' => ''
            ],
            //SEO
            [
                'group' => 'seo',
                'key' => 'description',
                'value' => ''
            ],
            //Hero
            [
                'group' => 'hero',
                'key' => 'h5',
                'value' => 'Welcome To Medinova'
            ],
            [
                'group' => 'hero',
                'key' => 'title',
                'value' => 'Best Healthcare Solution In Your City'
            ],
            //About
            [
                'group' => 'about',
                'key' => 'h5',
                'value' => 'About Us'
            ],
            [
                'group' => 'hero',
                'key' => 'title',
                'value' => 'Best Medical Care For Yourself and Your Family'
            ],
            [
                'group' => 'hero',
                'key' => 'about_description',
                'value' => 'Tempor erat elitr at rebum at at clita aliquyam consetetur. Diam dolor diam ipsum et, tempor
                    voluptua sit consetetur sit. Aliquyam diam amet diam et eos sadipscing labore. Clita erat ipsum
                    et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor consetetur
                    takimata eirmod, dolores takimata consetetur invidunt magna dolores aliquyam dolores dolore.
                    Amet erat amet et magna'
            ],
        ];

        foreach($settings as $setting){
            DB::table('settings')->updateOrInsert(
                ['key' => $setting['key']],
                [
                    'group' => $setting['group'],
                    'value' => $setting['value'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );
        }

    }
}
