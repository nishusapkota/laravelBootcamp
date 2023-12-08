<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'password',
        'password_confirmation',
        'country',
        'salary',
        'description',
        'age',
        'hobby',
        'image',
        'zipcode',
        'remember_me'

    ];
}
