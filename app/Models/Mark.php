<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $table = 'marks';
    protected $fillable = ['student_id', 'subject', 'score'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}