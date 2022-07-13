<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table ='announcements';
    protected $id = 'a_id';
    protected $timestamp = true;
    protected $fillable = [
        'e_id',
        's_id',
        'description',
        'state'
    ];

    public function Employee(){
        return $this->belongsTo(User::class,'e_id');
    }

    public function section(){
        return $this->belongsTo(Section::class,'s_id');
    }

}
