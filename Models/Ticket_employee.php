<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket_employee extends Model
{
    use HasFactory;
    protected $table ='ticket_employees';
    protected $id = 'te_id';
    protected $timestamp = true;
    protected $fillable = [
        't_id',
        'u_id',
        'sendOrReceive'
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class,'t_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'e_id');
    }
}
