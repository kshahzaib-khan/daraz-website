<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class SliderController extends Controller
{
    public  function index(){
        $slider = Slider::all();
        return view('admin.slider.index',compact('slider'));
    }


    public  function create(){
        return view('admin.slider.create');
    }

    public  function store_slider(Request $request){
        $slider = new Slider();

        $slider->heading = $request->heading;
        $slider->description = $request->description;
        $slider->link = $request->link;
        $slider->link_name = $request->link_name;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/slider/',$filename);
            $slider->image = $filename;
        }

          $slider->status = $request->input('status') == true ? '1':'0';
           $slider->save();
        return redirect()->back()->with('status','Slider Added Successfully');
    }


       public function edit_slider($id){
         $slider = Slider::find($id);

          return view('admin.slider.edit',compact('slider'));
       }


       public  function update_slider(Request $request,$id){
        $slider = Slider::find($id);

        $slider->heading = $request->heading;
        $slider->description = $request->description;
        $slider->link = $request->link;
        $slider->link_name = $request->link_name;



        if($request->hasFile('image')){
            $destination= 'upload/slider/'.$slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('upload/slider/',$filename);
            $slider->image = $filename;
        }

          $slider->status = $request->input('status') == true ? '1':'0';
           $slider->save();
        return redirect('home-slider')->with('status','Slider Updated Successfully');
    }





}
