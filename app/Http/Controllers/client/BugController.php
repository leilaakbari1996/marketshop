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
        Bug::query()->create([
            'bug' => $request->get('bug')
        ]);
        session()->flash('success','گزارش خطا شما با موفقیت ثبت شد.متشکرم از شما!');
        return redirect(route('client.bug.create'));
    }
}
