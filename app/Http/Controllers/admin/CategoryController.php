<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\PropertyGroup;
use App\Models\Specialcategory;
use App\Observers\CategoryObserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index',[
            'title' => 'لیست دسته بندی',
            'categories' => Category::all(),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create',[
            'title' => 'ایجاد دسته بندی',
            'categories' => Category::getCategoryAndSubcategory(),
            'propertyGroups' => PropertyGroup::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::query()->create([
            'category_id' => $request->get('category_id'),
            'name' => $request->get('name')
        ]);
        $category->propertyGroups()->attach($request->get('propertyGroups'));
        return redirect(route('admin.category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',[
            'categories' => Category::getCategoryAndSubcategory(),
            'categoryMain' => $category,
            'title' => 'ویرایش دسته بندی '.$category->name,
            'propertyGroups' => PropertyGroup::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->get('name'),
            'category_id' => $request->get('category_id')
        ]);
        $category->propertyGroups()->sync($request->get('propertyGroups'));
        session()->flash('success',' دسته بندی '.$category->name .'  با موفقیت ویرایش شد ');
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->childrens()->count() != 0){
            return redirect(route('admin.category.index'))->withErrors([
                'category_id' => 'این دسته بندی نمیتواند حذف شود چون والد دسته بندی های دیگر می باشد.'
            ]);
        }
        Storage::delete($category->image);
        $category->delete();
        return redirect(route('admin.category.index'));

    }
}
