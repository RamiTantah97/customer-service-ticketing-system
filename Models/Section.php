<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $table ='sections';
    protected $id = 's_id';
    protected $timestamp = true;
    protected $fillable = [
        'manager_id',
        'name',
        'tickets_num'
    ];

    public function manager(){
        return $this->belongsTo(User::class,'manager_id');
    }

    public function problem_types(){
        return $this->hasMany(Problem_type::class,'s_id');
    }

    public function announcements(){
        return $this->hasMany(Announcement::class,'s_id');
    }

    public function employee(){
        return $this->hasMany(User::class,'s_id');
    }

}



