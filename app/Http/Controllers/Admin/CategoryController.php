<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories= Category::all();
        // dd($categories);
        $total_category=$categories->count();
        $active_category=Category::where('status',1)->count();
        $inactive_category=Category::where('status',0)->count();
        return view('admin.categories',compact('categories','total_category','active_category','inactive_category'));
    }

    function add_category(Request $request){
        if($request->isMethod('post')){
            // dd($request->input());

            $validated=$request->validate([
                'name'=>'required'
            ]);

            $slug = Str::slug($validated['name']);
            $originalSlug = $slug;
            $count = 1;

            while (Category::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $category = Category::create([
                'name' => $validated['name'],
                'slug'     => $slug,
                'status'   => $request->input('status')
            ]);


            if($category){
                return response()->json(['status'=>true,'message'=>'Category added successfully']);
            }else{
                return response()->json(['status'=>false,'message'=>'Failed to add Category']);
            }
        }

    }

    public function edit_category(Request $request,$id){

        if($request->isMethod('post')){
            // dd($request->input());
            $validated=$request->validate([
                'name'=>'required'
            ]);

            $category = Category::findOrFail($id);

            // slug logic
            $slug = $category->slug;

            if (trim($request->name) !== trim($category->name)) {

                $slug = Str::slug($request->name);
                $originalSlug = $slug;
                $count = 1;

                while (
                    Category::where('slug', $slug)
                        ->where('id', '!=', $category->id)
                        ->exists()
                ) {
                    $slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }


            $category->update([
                'name'=>$validated['name'],
                'slug'=> $slug,
                'status'=>$request->input('status')
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Category has been updated!'
            ]);

        }else{
            $category=Category::findOrFail($id);
            // dd($category);
            
            return response()->json([
                'category'   => $category
            ]);
        }

    }

   
    public function delete_category($id){
        $category = Category::findOrFail($id);
        
        // Finally, delete the slider
        $category->delete();

        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully'
        ]);
    }
}
