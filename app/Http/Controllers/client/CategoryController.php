<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category){
        $products = Category::getIdAllSubCategory($category->id);
        return view('client.category',[
            'title' => 'لیست دسته بندی ها',
            'products' => $products,
            'categoryMain' => $category

        ]);
    }
}
