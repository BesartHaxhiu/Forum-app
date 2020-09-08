<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //Creating the relationship between the models created.

    public function getRouteKeyName()
    {
        //this function tells laravel that when an Route Key is being searched
        //Laravel looks for this function basing on controller(show Function) that tells Laravel
        //to show all question(Default by id) but we say to sort them by slug in our case.
        return 'slug';
    }

    //protected $fillable = ['title', 'slug','body','category_id','user_id'];
    protected $guarded = ['id'];


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
    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }
}
