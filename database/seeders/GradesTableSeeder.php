<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grades')->delete();
       $grades = [
           ['ar'=> 'الابتدائية','en'=>'Primary'],
           ['ar'=> 'الاعدادية', 'en'=>'Middle-school'],
           ['ar'=> 'الثانوية', 'en'=>'Secondary'],

        ];
        foreach($grades as $grade){
           Grade::create(['Name'=>$grade]);
        }
    }
}
