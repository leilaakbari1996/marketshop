<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Specialcategory;
use Illuminate\Http\Request;

class SpecialCategoryController extends Controller
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
        return view('admin.category.special',[
            'title' => 'دسته بندی ویژه',
            'categories' => Category::all(),
            'specialCategory' => Specialcategory::all()
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => ['required','exists:categories,id']
        ]);
        $special = Specialcategory::all();
        if($special->count() == 0){
            Specialcategory::query()->create([
                'category_id' => $request->get('category_id')
            ]);
        }else{
           $special = $special->first();
           $special->update([
               'category_id' => $request->get('category_id')
           ]);
        }
        return redirect(route('admin.category.special.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Specialcategory $specialcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialcategory $specialcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialcategory $specialcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialcategory  $specialcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialcategory $specialcategory)
    {
        //
    }
}
