<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Teacher extends Authenticatable
{
    use HasTranslations;

    protected $guareded=[];
    public $translatable=['Name'];
// relationship between teachers and genders to get gender name of teacher
  public function genders(){
    return $this->belongsTo(Gender::class,'Gender_id');
  }
  // relationship between teachers and specializations to get specialization name of teacher
  public function specializations(){
    return $this->belongsTo(Specialization::class,'Specialization_id');
  }
  public function sections()
  {
     return $this->belongsToMany(Sections::class,'teacher_section');
  }
}
