<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasTranslations;
    public $translatable = ['Name_Class'];

    protected $table = 'Classrooms';
    public $timestamps = true;
    protected $fillable=['Name_Class','Grade_Id'];

    public function Grades()
    {
        return $this->belongsTo(Grade::class, 'Grade_Id');

    }

}
