<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem_type extends Model
{
    use HasFactory;

    protected $table ='problem_types';
    protected $id = 'p_id';
    protected $timestamp = true;
    protected $fillable = [
        's_id',
        'name'
    ];

    public function section(){
        return $this->belongsTo(Section::class,'s_id');
    }
    
    public function ticket(){
        return $this->hasMany(Ticket::class,'p_id');
    }
}
