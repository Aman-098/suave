<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\Video;

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
        $videos=Video::all();

        $total_video=$videos->count();
        $active_video=Video::where('status',1)->count();
        $inactive_video=Video::where('status',0)->count();

        return view('admin.manage-videos',compact('videos','total_video','active_video','inactive_video'));


    }

    function add_video(Request $request){
        if($request->isMethod('post')){
            // dd($request->input());

            $validated=$request->validate([
                'title'=>'required',
                'code'=>'required',
            ]);

            $video = Video::create([
                'title' => $validated['title'],
                'code'=>$validated['code'],
                'status'=>$request->input('status'),
            ]);

            
            if($video){
                return response()->json(['status'=>true,'message'=>'Video added successfully']);
            }else{
                return response()->json(['status'=>false,'message'=>'Failed to add Video']);
            }
        }

    }

    public function edit_video(Request $request,$id){

        if($request->isMethod('post')){
            // dd($request->input());
            $validated=$request->validate([
                'title'=>'required',
                'code'=>'required',
            ]);

            $video = Video::findOrFail($id);


            $video->update([
                'title'=>$validated['title'],
                'code'=>$validated['code'],
                'status'=>$request->input('status'),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Video has been updated!'
            ]);

        }else{
            $video=Video::findOrFail($id);
            // dd($video);
            
            return response()->json([
                'video'   => $video
            ]);
        }

    }

    public function delete_video($id){
        $video = Video::findOrFail($id);

        
        // Finally, delete the video
        $video->delete();

        return response()->json([
            'status' => true,
            'message' => 'Video deleted successfully'
        ]);
    }
}
