<?php

namespace App\Models;




use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Student extends Authenticatable
{
    use HasTranslations;


    use SoftDeletes;

    public $translatable = ['name'];
    protected $guarded = [];

    public function gender(){
        return $this->belongsTo(Gender::class,'gender_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class,'Grade_id');
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class,'Classroom_id');
    }

    public function section(){
        return $this->belongsTo(Sections::class,'section_id');
    }

    public function Nationality(){
        return $this->belongsTo(Nationality::class,'nationalitie_id');
    }

    public function myparent(){
        return $this->belongsTo(MyParent::class,'parent_id');
    }
//علاقة بين الطلاب والصور لجلب الصور في جدول الطلاب
    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function student_account(){

        return $this->hasMany(StudentAccount::class,'student_id');

    }
    // علاقة بين الطالب و الغياب والحضور
    public function attendance(){

        return $this->hasMany(Attendance::class,'student_id');

    }
}
