<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'age',
        'sex',
        'email',
        'phone_number',
        'symptoms',
        'diagnosis',
        'prescription'
    ];
}