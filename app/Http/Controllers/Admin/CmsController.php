<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\Video;
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

    // Mnaage videos function

    public function videos(){
        $videos=Gallery::all();

        $total_video=$videos->count();
        $active_video=Gallery::where('status',1)->count();
        $inactive_video=Gallery::where('status',0)->count();

        return view('admin.manage-videos',compact('videos','total_video','active_video','inactive_video'));


    }

    function add_video(Request $request){
        if($request->isMethod('post')){
            // dd($request->input());

            $validated=$request->validate([
                'title'=>'required',
                'code'=>'required',
            ]);

            $gallery = Gallery::create([
                'title' => $validated['title'],
                'code'=>$validated['code'],
                'status'=>$request->input('status'),
            ]);

            
            if($gallery){
                return response()->json(['status'=>true,'message'=>'Image added successfully']);
            }else{
                return response()->json(['status'=>false,'message'=>'Failed to add Image']);
            }
        }

    }

    public function edit_video(Request $request,$id){

        if($request->isMethod('post')){
            // dd($request->input());
            $validated=$request->validate([
                'image'=>'required',
               
            ]);

            $image = Gallery::findOrFail($id);


            $video->update([
                
                'image'=>$validated['image'],
                'status'=>$request->input('status'),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Image has been updated!'
            ]);

        }else{
            $gallery=Gallery::findOrFail($id);
            // dd($video);
            
            return response()->json([
                'gallery'   => $gallery
            ]);
            
        }

    }

    public function delete_video($id){
        $video = Gallery::findOrFail($id);

        
        // Finally, delete the video
        $video->delete();

        return response()->json([
            'status' => true,
            'message' => 'Image deleted successfully'
        ]);
    }
}
