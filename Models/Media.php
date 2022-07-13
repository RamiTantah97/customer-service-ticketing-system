<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $table ='media';
    protected $id = 'm_id';
    protected $timestamp = true;
    protected $fillable = [
        't_id',
        'type',
        'link'
    ];

   public function ticket(){
    return $this->belongsTo(Ticket::class,'t_id');
   }
   
}
