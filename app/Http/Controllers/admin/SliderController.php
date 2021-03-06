<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\CheckPermission;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckPermission::class.':update-slider')->only('edit','update');
        $this->middleware(CheckPermission::class.':delete-slider')->only('delete');
        $this->middleware(CheckPermission::class.':create-slider')->only('create');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slider.index',[
            'title' => 'اسلایدر',
            'sliders' => Slider::all(),
            'check_permission' => auth()-> user()->role->haspermission('create-slider')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'image' => ['required','mimes:png,jpg']
        ]);
        $sliders = Slider::all();
        $sliderIds = $sliders->pluck('id');
        $shom = 0;
        for($i = 1 ; $i < 4 ; $i++){
            foreach($sliderIds as $sliderId){
                if($sliderId == $i){
                    $shom = 1;
                    break;
                }else{
                    $shom = 0;
                }
            }
            if($shom == 0){
                $id = $i;
            }
        }
        $path = $request->file('image')->storeAs('public/slider',$request->file('image')->getClientOriginalName());
        Slider::query()->create([
            'id' => $id,
            'image' => $path,
        ]);
        return redirect(route('admin.slider.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',[
            'title' => 'ویرایش اسلاید',
            'slider' => $slider
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        Storage::delete($slider->image);
        $request->validate([
            'image' => ['required','mimes:png,jpg']
        ]);
        $path = $request->file('image')->storeAs('public/slider',$request->file('image')->getClientOriginalName());
        $slider->update([
            'image' => $path
        ]);
        return redirect(route('admin.slider.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        Storage::delete($slider->image);
        $slider->delete();
        return redirect(route('admin.slider.index'));
    }
}
