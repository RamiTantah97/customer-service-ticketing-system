<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communicate extends Model
{
    use HasFactory;
    protected $table ='communicates';
    protected $id = 'communicate_id';
    protected $timestamp = true;
    protected $fillable = [
        'communication_id',
        'description'
    ];

    public function communication(){
        return $this->belongsTo(Communication::class,'communicatin_id');
    }
}
