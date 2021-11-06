<?php

namespace App\Http\Controllers\admin;

use App\Models\Suport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermission;

class SuportController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermission::class.':suported');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.suport.index',[
            'title' => 'لیست پیام ها به پشتیبان سایت',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suport = Suport::query()->where('id',$request->get('id'))->first();
        $suport->update([
            'answer' => $request->get('answer'),
            'status' => 1
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suport  $suport
     * @return \Illuminate\Http\Response
     */
    public function show(Suport $suport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suport  $suport
     * @return \Illuminate\Http\Response
     */
    public function edit(Suport $suport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suport  $suport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suport $suport)
    {
        $suport->update([
            'status' => 1
        ]);
        return redirect(route('admin.suport.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suport  $suport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suport $suport)
    {
        $suport->update([
            'status' => 2
        ]);
       return redirect(route('admin.suport.index'));
    }
}
