<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    //
    public function index(){
        
        $blogs=Blog::all();

        $total_blogs=$blogs->count();
        $active_blogs=Blog::where('status',1)->count();
        $inactive_blogs=Blog::where('status',0)->count();

        return view('admin.blogs',compact('blogs','total_blogs','active_blogs','inactive_blogs'));
    }

    function add_blog(Request $request){
        if($request->isMethod('post')){
            // dd($request->input());

            $validated=$request->validate([
                'title'=>'required',
                'author'=>'required',
                'content'=>'required',
            ]);

            $slug = Str::slug($validated['title']);
            $originalSlug = $slug;
            $count = 1;

            while (Blog::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $blog = Blog::create([
                'title' => $validated['title'],
                'author' => $validated['author'],
                'slug'     => $slug,
                'description'=>$validated['content'],
                'status'   => $request->input('status')
            ]);

            if ($request->hasFile('image')) {

                $image = $request->file('image');

                // folder path inside storage/app/public/
                $folder = 'blogs';

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
                $blog->update([
                    'image' => $imagePath

                ]);
            }

            if($blog){
                return response()->json(['status'=>true,'message'=>'Blog added successfully']);
            }else{
                return response()->json(['status'=>false,'message'=>'Failed to add Blog']);
            }
        }

    }

    public function edit_blog(Request $request,$id){

        if($request->isMethod('post')){
            // dd($request->input());
            $validated=$request->validate([
                'title'=>'required',
                'author'=>'required',
                'content'=>'required',
            ]);

            $blog = Blog::findOrFail($id);

            // slug logic
            $slug = $blog->slug;

            if (trim($request->title) !== trim($blog->title)) {

                $slug = Str::slug($request->title);
                $originalSlug = $slug;
                $count = 1;

                while (
                    Blog::where('slug', $slug)
                        ->where('id', '!=', $blog->id)
                        ->exists()
                ) {
                    $slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }

            $image = $blog->image;

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                $folder = 'blogs';

                if (!Storage::disk('public')->exists($folder)) {
                    Storage::disk('public')->makeDirectory($folder);
                }

                $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                Storage::disk('public')->putFileAs($folder, $file, $imageName);

                if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                    Storage::disk('public')->delete($blog->image);
                }

                $image = $folder . '/' . $imageName;
            }


            $blog->update([
                'title'=>$validated['title'],
                'author'=>$validated['author'],
                'slug'=> $slug,
                'description'=>$validated['content'],
                'image'=> $image,
                'status'=>$request->input('status')
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Blog has been updated!'
            ]);

        }else{
            $blog=Blog::findOrFail($id);
            // dd($blog);
            
            return response()->json([
                'blog'   => $blog
            ]);
        }

    }

   
    public function delete_blog($id){
        $blog = Blog::findOrFail($id);

        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }
        
        // Finally, delete the slider
        $blog->delete();

        return response()->json([
            'status' => true,
            'message' => 'Blog deleted successfully'
        ]);
    }
}
