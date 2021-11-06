<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function __construct()
    {//only users logined
        $this->middleware('auth');
    }
    public function index(){
        $user = auth()->user();
        return view('client.like.index',[
            'title' => 'لیست علاقه مندی های من',
            'products' => $user->likes()->where('user_id',$user->id)->get(),
        ]);
    }
    public function store(Product $product){
        User::likeProduct($product);
        return response([
            'msg' => 'likes'
        ],200);

    }
}
