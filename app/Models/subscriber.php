<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscriber extends Model
{
    use HasFactory;
    public function contacts(){
        return $this->hasMany(Contact::class,'author_id','id')->orderBy('created_at', 'desc')->limit(3);
    }
}
