<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table ='tickets';
    protected $id = 't_id';
    protected $timestamp = true;
    protected $fillable = [
        'communication_id',
        'senderE_id',
        'receiverE_id',
        'p_id',
        'description',
        'priority',
        'state',
        'archived'
    ];

    public function communication(){
        return $this->belongsTo(Communication::class,'communicatin_id');
    }

    public function problem_type(){
        return $this->belongsTo(Problem_type::class,'p_id');
    }

    public function senderE(){
        return $this->belongsTo(User::class,'senderE_id');
    }

    public function receiverE(){
        return $this->belongsTo(User::class,'receiverE_id');
    }

    public function media(){
        return $this->hasMany(Media::class,'t_id');
    }

    public function comment(){
        return $this->hasMany(Comment::class,'t_id');
    }

    public function ticket_employee(){
        return $this->hasMany(Ticket_employee::class,'t_id');
    }

}
