<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Sections;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function Get_classrooms($id)
    {
        $list_classes = Classroom::where('Grade_id',$id)->pluck('Name_Class','id');
        return $list_classes;
    }

    public function Get_Sections($id)
    {
        $list_sections = Sections::where('class_id',$id)->pluck('Name_Section','id');
        return $list_sections;
    }
}
