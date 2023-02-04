<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert([
            'name' => 'desculpa',
            'link' => 'http://localhost:8000/desculpa',
            'icon' => 'fa-regular fa-face-smile',
            'is_active' => '0',
        ]);

        DB::table('links')->insert([
            'name' => 'instagram',
            'link' => 'https://www.instagram.com/lu.paraiso/',
            'icon' => 'fa-brands fa-instagram',
            'is_active' => '1',
        ]);

        DB::table('links')->insert([
            'name' => 'give up',
            'link' => 'https://youtu.be/dQw4w9WgXcQ',
            'icon' => 'fa-brands fa-youtube',
            'is_active' => '0',
        ]);
    }
}
