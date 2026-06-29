<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    public function run(): void
    {
        Link::insert([
            [
                'profile_id' => 1,
                'title' => 'Instagram',
                'url' => 'https://instagram.com/nuradiyat',
                'icon' => 'heroicon-o-camera',
                'sort_order' => 1,
                'click_count' => 320,
            ],
            [
                'profile_id' => 1,
                'title' => 'LinkedIn',
                'url' => 'https://linkedin.com/in/nuradiyat',
                'icon' => 'heroicon-o-user',
                'sort_order' => 2,
                'click_count' => 210,
            ],
            [
                'profile_id' => 1,
                'title' => 'GitHub',
                'url' => 'https://github.com/nuradiyat',
                'icon' => 'heroicon-o-code-bracket',
                'sort_order' => 3,
                'click_count' => 560,
            ],
            [
                'profile_id' => 1,
                'title' => 'Portfolio',
                'url' => 'https://portfolio.com',
                'icon' => 'heroicon-o-globe-alt',
                'sort_order' => 4,
                'click_count' => 155,
            ],
            [
                'profile_id' => 1,
                'title' => 'WhatsApp',
                'url' => 'https://wa.me/6281234567890',
                'icon' => 'heroicon-o-chat-bubble-left-right',
                'sort_order' => 5,
                'click_count' => 98,
            ],
            [
                'profile_id' => 1,
                'title' => 'Email',
                'url' => 'mailto:nuradiyat@gmail.com',
                'icon' => 'heroicon-o-envelope',
                'sort_order' => 6,
                'click_count' => 42,
            ],
        ]);
    }
}
