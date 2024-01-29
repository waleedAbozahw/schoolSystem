<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReligionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('religions')->delete();
        $religions = [
            [
                'en'=> 'Muslim',
                'ar'=> 'مسلم',
            ],
            [
                'en'=> 'Cristian',
                'ar'=> 'مسيحي',
            ]


        ];
        foreach ($religions as $r) {
           Religion::create(['Name'=> $r]);
        }
    }
}
