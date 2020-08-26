<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //Creating the relationship between the models created.

    public function user() // A question belongs to any user or any user can create a question
    {
        return $this->belongsTo(User::class);
    }

    public function replies() // a question has many replies
    {
        return $this->hasMany(Reply::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
