<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Science', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
            ['en'=> 'Math', 'ar'=> 'رياضيات'],
            ['en'=> 'Geography', 'ar'=> 'جغرافيا'],
            ['en'=> 'Hestory', 'ar'=> 'تاريخ'],
            ['en'=> 'Religion', 'ar'=> 'تربية دينية اسلامية'],
        ];
        foreach ($specializations as $S) {
            Specialization::create(['Name' => $S]);
        }
    }
}
