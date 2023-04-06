<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        for ($x = 0; $x <= 5; $x+=1) {
            DB::table('Cards')->insert([
                'type'=>Str::random(10),
                'vehicles'=>Str::random(10),
                'seat'=>rand(2,50),
                'distance'=>rand(2,50),
                'content'=>Str::random(1,2),
                'price'=>rand(2,50),
                'image'=>Str::random(100),
            ]);
        }
        
    } 
}
