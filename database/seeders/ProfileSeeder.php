<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'user_id'   => 1,
            'photo'     => null,
            'name'      => 'Muhammad Nuradiyat',
            'username'  => 'nuradiyat',
            'headline'  => 'Web Developer | Data Analyst',
            'bio'       => 'Saya membuat website menggunakan Laravel dan Filament.',
            'email'     => 'nuradiyat@gmail.com',
            'phone'     => '081345295651',
            'location'  => 'Indonesia',
        ]);
    }
}
