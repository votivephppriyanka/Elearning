<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'courses';
    protected $fillable = [
        'course_name'
    ];
    //public $timestamps = false;
}
