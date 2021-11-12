<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use Illuminate\Http\Request;

class BugController extends Controller
{
    public function create(){
        return view('client.bug.create',[
            'title' => 'گزارش خطا'
        ]);
    }
    public function store(Request $request){
        $path = $request->file('image')->storeAs('public/bug',$request->file('image')->getClientOriginalName());
        Bug::query()->create([
            'bug' => $request->get('bug'),
            'image' => $path
        ]);
        session()->flash('success','گزارش خطا شما با موفقیت ثبت شد.متشکرم از شما!');
        return redirect(route('client.bug.create'));
    }
}
