<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class onlineClass extends Model
{
    //protected $guarded=[''];
    public $fillable= ['Grade_id','Classroom_id','section_id','created_by','meeting_id','topic','start_at','duration','password','start_url','join_url'];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }


    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'Classroom_id');
    }


    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
