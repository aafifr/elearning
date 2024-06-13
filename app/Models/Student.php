<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    // mendefinisikan field yang boleh diisi
    protected $fillable = ['name', 'nim', 'class', 'major', 'courses_id'];

    // mendefinisikan relasi ke model courses
    public function courses () {
        return $this->belongsTo(Courses::class, 'courses_id');
    }
}
