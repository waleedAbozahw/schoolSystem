<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('classrooms')->delete();
       $classrooms = [
             ['ar'=> 'الصف الاول','en'=> 'First'],
             ['ar'=> 'الصف الثاني','en'=> 'Second'],
             ['ar'=> 'الصف الثالث','en'=> 'Thired'],
       ];
       foreach($classrooms as $classroom){
          Classroom::create([
            'Name_Class'=>$classroom,
            'Grade_id'=> Grade::all()->unique()->random()->id
          ]);
       }
    }
}
