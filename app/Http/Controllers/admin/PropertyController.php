<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertRequest;
use App\Http\Middleware\CheckPermission;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermission::class.':create-property')->only('create','store');
        $this->middleware(CheckPermission::class.':update-property')->only(['edit','update']);
        $this->middleware(CheckPermission::class.':delete-property')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.property.index',[
            'title' => 'لیست ویژگی ها',
            'properteis' => Property::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.property.create',[
            'title' => 'ایجاد ویژگی ',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertRequest $request)
    {
        Property::query()->create([
            'name' => $request->get('name')
        ]);
        return redirect(route('admin.property.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        if($property->products()->count() != 0){
            return redirect(route('admin.property.index'))->withErrors($property->name.' نمی تواند حذف شود چون متعلق به یک سری محصولات است');
        }
        $property->propertyGroups()->detach();
        $property->delete();
        return redirect(route('admin.property.index'));
    }

}
