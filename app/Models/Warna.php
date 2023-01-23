<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Warna extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = "warna";
    protected $fillable = ['warna_name'];
    // protected $dates = ['deleted_at'];
}
