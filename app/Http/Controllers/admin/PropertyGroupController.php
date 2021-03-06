<?php

namespace App\Http\Controllers\admin;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\PropertyGroup;
use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckPermission;
use App\Http\Requests\PropertyGroupRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdatePropertyGroupRequest;

class PropertyGroupController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermission::class.':create-property-group')->only('create','store');
        $this->middleware(CheckPermission::class.':update-property-group')->only(['edit','update']);
        $this->middleware(CheckPermission::class.':delete-property-group')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.propertyGroup.index',[
            'title' => 'لیست گروه های ویژگی',
            'propertyGroups' => PropertyGroup::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.propertyGroup.create',[
            'title' => 'ایجاد گروه ویژگی',
            'properties' => Property::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertyGroupRequest $request)
    {
        $propertyGroup = PropertyGroup::query()->create([
            'name' => $request->get('name')
        ]);
        $propertyGroup->properties()->attach($request->get('properties'));
        return redirect(route('admin.propertyGroup.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyGroup $propertyGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyGroup $propertyGroup)
    {
        return view('admin.propertyGroup.edit',[
            'title' => 'ویرایش گروه ویژگی',
            'properties' => Property::all(),
            'propertyGroup' => $propertyGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyGroupRequest $request, PropertyGroup $propertyGroup)
    {
        $is_check = PropertyGroup::query()->where('name',$request->get('name'))->where('id','!=',$propertyGroup->id)->exists();
        if($is_check){
            return redirect(route('admin.propertyGroup.edit',$propertyGroup))->withErrors([
                'name' => 'این عنوان برای گروه ویژگی از قبل موجود است لطفا عنوان را تغییر دهید.'
            ]);
        }
        $propertyGroup->update([
            'name' => $request->get('name', $propertyGroup->name)
        ]);
        $propertyGroup->properties()->sync($request->get('properties'));
        return redirect(route('admin.propertyGroup.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyGroup  $propertyGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyGroup $propertyGroup)
    {
        if($propertyGroup->properties()->count() != 0){
            return redirect(route('admin.propertyGroup.index'))->withErrors('این گروه ویژگی نمی تواند حذف شود چون یک سری ویژگی متعلق به آن می باشد.');
        }
        $propertyGroup->delete();
        return redirect(route('admin.propertyGroup.index'));
    }
}
