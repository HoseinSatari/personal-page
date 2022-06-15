<?php

namespace Database\Seeders;

use App\Models\info_basic;
use App\Models\InfoBasic;
use Illuminate\Database\Seeder;

class InfoBasicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        info_basic::create([
            'name' => 'حسین ستاری',
            'birth' => '2001/04/19',
            'place' => 'گنبد',
            'country' => 'ایران',
            'phone' => '09305257455',
            'email' => 'ho3einsss84@gmail.com',
            'about' => 'من یک طراح و توسعه دهنده مستقل آزاد مستقر در تهران ، ایران هستم. من در تلاش هستم تا از طریق کد دقیق و طراحی کاربر محور ، برنامه های کاربردی وب همه جانبه و زیبا بسازم.',
            'year_work' => '3',
            'img' => '/photo',
        ]);
    }
}
