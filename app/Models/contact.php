<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\subscriber;


class contact extends Model
{

    use HasFactory;

    public function author()
    {
        return $this->hasOne(Subscriber::class, 'id', 'author_id'); //hasOne represents one to one relation
    }
}
