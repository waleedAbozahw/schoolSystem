<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipt_student extends Model
{
    protected $guarded=[];

    public function student(){
     return $this->belongsTo(Student::class,'student_id');
 }
}
