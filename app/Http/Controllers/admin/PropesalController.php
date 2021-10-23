<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Propesal;
use Illuminate\Http\Request;

class PropesalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.propesal.index',[
            'title' => 'محصولات پیشنهادی',
            'products' => Product::all()
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
    public function store(Request $request,Product $product)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propesal  $propesal
     * @return \Illuminate\Http\Response
     */
    public function show(Propesal $propesal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propesal  $propesal
     * @return \Illuminate\Http\Response
     */
    public function edit(Propesal $propesal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propesal  $propesal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($product->is_propesal){
            $propesal = Propesal::query()->where('product_id',$product->id)->first();
            $propesal->delete();
        }else{
            Propesal::query()->create([
                'product_id' => $product->id,
            ]);
        }
        return response([
            'msg' => 'succesful',
            'productName' => $product->name
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propesal  $propesal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propesal $propesal)
    {
        //
    }
}
