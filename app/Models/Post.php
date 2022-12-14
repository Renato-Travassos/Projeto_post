<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $casts=['tipos'=>'array'];
     
    protected $dates=['date'];

    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
        }
        
}
