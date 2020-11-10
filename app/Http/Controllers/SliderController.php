<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
     public function getSliderManage(){
        $data =[
            'sliders'=>Slider::all()
        ];
        return view('admin.slider.manage', $data);
    }
    public function getSliderDelete(Slider $slider){
    	unlink('site/slider/'.$slider->photo);
    	$slider->delete();
    	return redirect()->back()->with('message', 'Slider Deleted Success');
    }

    public function postSliderAdd(Request $request){
    	$photo = $request->file('photo');
    	$title = $request->input('title');
    	$subtitle = $request->input('subtitle');
    	$link = $request->input('link');

    		$getuniquename = sha1($photo->getClientOriginalName().time());
            $getextension = $photo->getClientOriginalExtension();
            $getrealname = $getuniquename.'.'.$getextension;
            $photo->move('site/slider/', $getrealname);

            $slider = New Slider;
            $slider->title = $title;
            $slider->subtitle = $subtitle;
            $slider->link = $link;
            $slider->photo = $getrealname;
            $slider->save();

            return redirect()->back()->with('message', 'Slider Added Success');
    }
    public function getSliderEdit( Slider $slider){ 
        $data=[
            'slider'=>$slider
        ];
        return view('admin.slider.edit',$data);
    }
    public function postSliderEdit(Request $request, Slider $slider){
        $photo = $request->file('photo');
        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $link = $request->input('link');
         if($photo){
            $getuniquename = sha1($photo->getClientOriginalName().time());
            $getextension = $photo->getClientOriginalExtension();
            $getrealname = $getuniquename.'.'.$getextension;
            $photo->move('site/slider/', $getrealname);
            unlink('site/slider/'.$slider->photo);

            $slider->title = $title;
            $slider->subtitle = $subtitle;
            $slider->link = $link;
            $slider->photo = $getrealname;
            $slider->save();
         }
         else{

            $slider->title = $title;
            $slider->subtitle = $subtitle;
            $slider->link = $link;
            $slider->save();
         }
          return redirect()->back()->with('message', 'Slider Edited Success');   
    }

    
}
