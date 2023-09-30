<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'Exam';
    protected $primarykey = 'id';

    protected $fillable = ['course_name','exam_date','start_time','end_time','present_students','leave_time'];
}
