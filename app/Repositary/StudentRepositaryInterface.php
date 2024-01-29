<?php
namespace App\Repositary;

interface StudentRepositaryInterface{

    // get add form student
    public function Create_Student();

    // get classrooms
    public function Get_classrooms($id);

    // get sections
    public function Get_Sections($id);

    // store students
    public function Store_Students($request);

    // get students
    public function Get_Students();

     // edit students
    public function Edit_Student($id);

    // update students
    public function Update_Student($request);

    // delete students
    public function Delete_Student($request);

    // show students
    public function Show_Student($id);

     // upload attachment
     public function Upload_Attachment($request);

     // download attachment
     public function Download_attachment($studentsname,$filename);

     // delete attachment
     public function Delete_attachment($request);



}


