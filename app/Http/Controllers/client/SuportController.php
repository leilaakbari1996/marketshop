<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Suport;
use App\Models\User;
use Illuminate\Http\Request;

class SuportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::query()->where('email',$request->get('email'))->first();
        Suport::query()->create([
            'user_id' => $user->id,
            'msg' => $request->get('msg')
        ]);
        return redirect(route('client.user.show',$user));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suport  $suport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suport $suport)
    {
        //
    }
}
