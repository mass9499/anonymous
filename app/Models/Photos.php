<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model {
    
    protected $fillable = [
        'id', 
        'item_id', 
        'filename'
    ];
    
}