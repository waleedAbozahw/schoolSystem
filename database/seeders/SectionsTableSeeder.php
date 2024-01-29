<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Sections;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('sections')->delete();
       $sections = [
        ['ar'=> 'ا','en'=>'A'],
        ['ar'=> 'ب','en'=>'B'],
        ['ar'=> 'ت','en'=>'C'],
       ];
       foreach ($sections as $section) {
          Sections::create([
            'Name_Section'=>$section,
            'Status'=>'1',
            'Grade_id'=>Grade::all()->unique()->random()->id,
            'Class_id'=>Classroom::all()->unique()->random()->id,

          ]);
       }
    }
}
