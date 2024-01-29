<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Sections extends Model
{
    use HasTranslations;
    public $translatable = ['Name_Section','Name'];


    protected $table = 'sections';
    public $timestamps = true;
    // protected $fillable=[
    //     'Name_Section',
    //     'Grade_id',
    //     'Class_id',
    // ];
    protected $guarded=[];

    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

    public function My_classs()
    {
        return $this->belongsTo(Classroom::class, 'Class_id');
    }
    public function Grades()
    {
        return $this->belongsTo(Grade::class,'Grade_id');
    }
    // relationship between teachers and sections
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class,'teacher_section');
     }
}
