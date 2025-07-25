<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = ['id'];
    protected $with = ['user'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

