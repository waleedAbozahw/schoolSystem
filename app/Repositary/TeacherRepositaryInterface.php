<?php
namespace App\Repositary;

interface TeacherRepositaryInterface{
    //get all teachers
    public function getAllTeachers();

    // get specialization
    public function Getspecialization();

    // get gender
    public function GetGender();

    // store teachers
    public function StoreTeachers($request);

    // edit teachers
    public function EditTeachers($id);


    // update teacher
    public function UpdateTeachers($request);

    // delete teacher
    public function DeleteTeachers($request);




}
