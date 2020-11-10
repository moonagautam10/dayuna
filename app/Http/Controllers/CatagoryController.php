<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Catagory;
use App\Models\Product;



class CatagoryController extends Controller
{
    public function getCatagoryManage(){
    	$data = [
    		'catagories'=>Catagory::all()
    	];
    	return view('admin.catagory.manage', $data);
    }
    public function getCatagoryDelete(Catagory $catagory){
    	
        // product table ma  yo id vaya ko product chaa ki chaaiena? chaaa vane delete gara nadine 
        $check = Product::where('catagory_id', $catagory->id)->count();
       if($check == 0){
        unlink('site/catagory/'.$catagory->photo);
    	$catagory->delete();
    	return redirect()->back()->with('message', 'Catagory Delete Success');
        }
        else{
           return redirect()->back()->with('message', 'Unable to delete catagory. This catagory used in product.');
        }
    }
    public function postCatagoryAdd(Request $request){
	    	$title = $request->input('title');
	    	$photo = $request->file('photo');
	    	$slug = Str::slug($title);

            $checkslug = Catagory::where('slug', $slug)->count();
            if($checkslug == 0){
                $getuniquename = sha1($photo->getClientOriginalName().time());
                $getextension = $photo->getClientOriginalExtension();
                $getrealname = $getuniquename.'.'.$getextension;
                $photo->move('site/catagory/', $getrealname);

                $catagory = New Catagory;
                $catagory->title = $title;
                $catagory->slug = $slug;
                $catagory->photo = $getrealname;
                $catagory->save();

                return redirect()->back()->with('message', 'Catagory Added Success');
            }
            else{
                return redirect()->back()->with('message', 'Unable to add. due to dublicate catagory title. Please change your title, which is unique from other catagory'); 
            }

    		
    }
    public function getCatagoryEdit(Catagory $catagory){
        $data=[
            'catagory'=>$catagory

        ];
        return view('admin.catagory.edit',$data);
    }
    public function postCatagoryEdit(Request $request , Catagory $catagory){
            $title = $request->input('title');
            $photo = $request->file('photo');
            $slug = Str::slug($title);
            // to check slug
            $checkslug = Catagory::where('slug', $slug)->where('id', '!=', $catagory->id)->count();
            if($checkslug == 0){
               if($photo){
                    $getuniquename = sha1($photo->getClientOriginalName().time());
                    $getextension = $photo->getClientOriginalExtension();
                    $getrealname = $getuniquename.'.'.$getextension;
                    $photo->move('site/catagory/', $getrealname);

                    $catagory->title = $title;
                    $catagory->slug = $slug;
                    $catagory->photo = $getrealname;
                    $catagory->save();
               }
               else{
                    $catagory->title = $title;
                    $catagory->slug = $slug;
                    $catagory->save();
               }
                return redirect()->route('getCatagoryManage')->with('message', 'Catagory Edit Success.');
            }
            else{
                return redirect()->back()->with('message', 'Unable to edit. due to dublicate catagory title. Please change your title, which is unique from other catagory');
            }
    }

}
