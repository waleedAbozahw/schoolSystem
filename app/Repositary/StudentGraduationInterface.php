<?php
namespace App\Repositary;

interface StudentGraduationInterface {
// graduation list
public function index();
// create graduation
public function create();
// graduate students
public function softDelete($request);
// return students
public function returnData($request);
// force delete students that graduated
public function destroy($request);

public function createOneGraduation($request);
}
