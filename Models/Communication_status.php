<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication_status extends Model
{
    use HasFactory;
    protected $table ='communication_statuses';
    protected $id = 'communication_id';
    protected $timestamp = true;
    protected $fillable = [
        'c_id'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class,'c_id');
    }

    public function communicate(){
        return $this->hasMany(Communicate::class,'communication_id');
    }

    public function ticket(){
        return $this->hasMany(Ticket::class,'communication_id');
    }
}
