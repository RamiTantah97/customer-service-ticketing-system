<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table ='customers';
    protected $id = 'c_id';
    protected $timestamp = true;
    protected $fillable = [
        'fName',
        'lName',
        'birthday',
        'photo',
        'phoneNum',
        'email'
    ];
}
