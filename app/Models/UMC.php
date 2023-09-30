<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMC extends Model
{
    use HasFactory;
    protected $table = 'UMC';
    // protected $primarykey = 'id';

    protected $fillable = ['roll_number'];

}
