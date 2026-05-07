<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use App\Models\Gallery;

class CmsController extends Controller
{
    //
    public function index(){
        $cms=Cms::all();
        return view('admin.manage-about',compact('cms'));
    }

    function add_cms(Request $request){
        if($request->isMethod('post')){
            // dd($request->input());

            $validated=$request->validate([
                'title'=>'required',
                'content'=>'required',
            ]);

            $cms = Cms::create([
                'title' => $validated['title'],
                'content'=>$validated['content'],
            ]);

            
            if($cms){
                return response()->json(['status'=>true,'message'=>'Content added successfully']);
            }else{
                return response()->json(['status'=>false,'message'=>'Failed to add Content']);
            }
        }

    }

    public function edit_cms(Request $request,$id){

        if($request->isMethod('post')){
            // dd($request->input());
            $validated=$request->validate([
                'title'=>'required',
                'content'=>'required',
            ]);

            $about = Blog::findOrFail($id);


            $about->update([
                'title'=>$validated['title'],
                'content'=>$validated['content'],
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Content has been updated!'
            ]);

        }else{
            $about=Blog::findOrFail($id);
            // dd($blog);
            
            return response()->json([
                'about'   => $about
            ]);
        }

    }

    // Mnaage gallery function

    public function videos(){
        $gallery=Gallery::all();

        $total_gallery=$gallery->count();
        $active_gallery=Gallery::where('status',1)->count();
        $inactive_gallery=Gallery::where('status',0)->count();

        return view('admin.manage-videos',compact('gallery','total_gallery','active_gallery','inactive_gallery'));


    }

    function add_video(Request $request)
    {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'title' => 'nullable|string',
                'image' => 'required|image',
                'status' => 'nullable',
            ]);

            $imagePath = null;

            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $folder = 'gallery';

                if (!Storage::disk('public')->exists($folder)) {
                    Storage::disk('public')->makeDirectory($folder);
                }

                $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

                Storage::disk('public')->putFileAs($folder, $image, $imageName);

                $imagePath = $folder . '/' . $imageName;
            }

            $gallery = Gallery::create([
                'name'  => $validated['title'] ?? null,
                'status' => $request->input('status'),
                'image'  => $imagePath,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Image added successfully'
            ]);
        }
    }

    public function edit_video(Request $request,$id){

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'title'=>'nullable|string',
                'image' => 'nullable|image',
            ]);

            $gallery = Gallery::findOrFail($id);

            $image = $gallery->image;

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $folder = 'gallery';

                // create folder if not exists
                if (!Storage::disk('public')->exists($folder)) {
                    Storage::disk('public')->makeDirectory($folder);
                }

                // generate unique image name
                $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                // upload image
                Storage::disk('public')->putFileAs($folder, $file, $imageName);

                // delete old image
                if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                    Storage::disk('public')->delete($gallery->image);
                }

                $image = $folder . '/' . $imageName;
            }

            $gallery->update([
                'name'=>$validated['title'] ?? null,
                'image'  => $image,
                'status' => $request->input('status'),
            ]);

            return response()->json([
                'status'  => true,
                'message' => 'Image has been updated!'
            ]);

        } else {

            $gallery = Gallery::findOrFail($id);

            return response()->json([
                'gallery' => $gallery
            ]);
        }

    }

    public function delete_video($id){
        $gallery = Gallery::findOrFail($id);

        // Finally, delete the video
       
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }
        
        // Finally, delete the slider
        $gallery->delete();

        return response()->json([
            'status' => true,
            'message' => 'Image deleted successfully'
        ]);
    }
}
