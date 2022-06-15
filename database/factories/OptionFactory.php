<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Option>
 */
class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sitename' => 'H-Sat',
            'description' => 'این سایت با هدف معرفی من ایجاد شد و اطلاعات کامل من در بحث کاری به اشتراک گذاشته شده است.',
            'keyword' => 'حسین ستاری,hosein satari,satari,ستاری,h-sat,h sat,سایت حسین ستاری,سایت شخصی,سایت نمونه کار,سایت رزومه,personal page,',
            'logo' => '/logo.png',
            'phone_support' => '09305257455',
            'phone_admin' => '09305257455',
            'instagram' => 'https://www.instagram.com/_hoseinsatari/',
            'whatsup' => 'whatsapp://send?phone=09305257455&abid=09305257455',
            'linkdin' => 'https://www.linkedin.com/in/hosein-sattari-006061226',
            'github' => 'https://github.com/HoseinSatari',
            'gitlab' => 'https://gitlab.com/hosseinsattari',
            'stackoverflow' => 'https://stackoverflow.com/users/19313480/hosein-satari',
            'twitter' => 'https://twitter.com/_hoseinsatari',
            'telegram' => 'https://t.me/hosein_satari',
            'is_active' => 1,
        ];
    }
}
