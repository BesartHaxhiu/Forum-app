<?php

namespace App\Http\Controllers;

use App\Model\Like;
use Illuminate\Http\Request;
use App\Model\Reply;

class LikeController extends Controller
{
        /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // we created our own middleware -> JWT,so when smth goes wrong the exception written in JWT middleware displays
        $this->middleware('JWT'); // here we changed middleware from 'JWT' to auth:api because it didnt work on postman
    }

    public function likeIt(Reply $reply)
    {
        $reply->like()->create([
            // 'user_id' => auth()->id()
            'user_id' => '1'
            ]);
    }

    public function unLikeIt(Reply $reply)
    {
        //$reply->like()->where(['user_id', auth()->id()])->first()->delte();
        $reply->like()->where('user_id', '1')->first()->delete();
    }
}
