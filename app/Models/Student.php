<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students'; // تعديل هنا لاستخدام سلسلة نصية بدلاً من مصفوفة
    protected $fillable = ['name', 'Father', 'Mother', 'age', 'name_teacher', 'Personal_number', 'Phon_number'];



    public function marks()
    {
        return $this->hasMany(Mark::class);
    }
}


