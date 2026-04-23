<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    //
    public function index(){
        $sliders= Slider::all();
        // dd($sliders);
        
        $total_slider=$sliders->count();
        $active_slider=Slider::where('status',1)->count();
        $inactive_slider=Slider::where('status',0)->count();
        return view('admin.sliders',compact('sliders','total_slider','active_slider','inactive_slider'));
    }

    public function add_slider(Request $request){

        if($request->isMethod('post')){
            // dd($request->input());

            $validated=$request->validate([
                'title'=>'required'
            ]);

            $slider = Slider::create([
                'title' => $validated['title'],
                'description' => $request->input('description'),
                'status'   => $request->input('status')
            ]);

            if ($request->hasFile('image')) {

                $image = $request->file('image');

                // folder path inside storage/app/public/
                $folder = 'sliders';

                // create folder if not exists
                if (!Storage::disk('public')->exists($folder)) {
                    Storage::disk('public')->makeDirectory($folder);
                }

                // unique name
                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                // store file
                Storage::disk('public')->putFileAs($folder, $image, $imageName);

                $imagePath = $folder . '/' . $imageName;

                // update DB
                $slider->update([
                    'image' => $imagePath

                ]);
            }

            if($slider){
                return response()->json(['status'=>true,'message'=>'Slider added successfully']);
            }else{
                return response()->json(['status'=>false,'message'=>'Failed to add Slider']);
            }
        }

    }

    public function edit_slider(Request $request,$id){

        if($request->isMethod('post')){
            // dd($request->input());
            $validated=$request->validate([
                'title'=>'required'
            ]);

            $slider = Slider::findOrFail($id);

            $image = $slider->image;

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $folder = 'sliders';

                if (!Storage::disk('public')->exists($folder)) {
                    Storage::disk('public')->makeDirectory($folder);
                }

                $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs($folder, $file, $imageName);

                if ($slider->image && Storage::disk('public')->exists($slider->image)) {
                    Storage::disk('public')->delete($slider->image);
                }

                $image = $folder . '/' . $imageName;
            }


            $slider->update([
                'title'=>$validated['title'],
                'description'=>$request->input('description'),
                'image'=> $image,
                'status'=>$request->input('status')
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Slider has been updated!'
            ]);

        }else{
            $slider=Slider::findorFail($id);
            // dd($slider);
            
            return response()->json([
                'slider'   => $slider
            ]);
        }

    }

   
    public function delete_slider($id){
        $slider = Slider::findOrFail($id);

        if ($slider->image && Storage::disk('public')->exists($slider->image)) {
            Storage::disk('public')->delete($slider->image);
        }
        
        // Finally, delete the slider
        $slider->delete();

        return response()->json([
            'status' => true,
            'message' => 'Slider deleted successfully'
        ]);
    }
}
