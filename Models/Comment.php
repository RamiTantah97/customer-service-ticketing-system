<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table ='comments';
    protected $id = 'comment_id';
    protected $timestamp = true;
    protected $fillable = [
        't_id',
        'u_id',
        'description'
    ];

    public function ticket(){
        return $this->belongsTo(Ticket::class,'t_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'u_id');
    }
}
