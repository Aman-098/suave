<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    //
    public function index() {
        $categories = Category::where('status', 1)->get();
        
        $products=Product::with('category')->get();

        $total_product=$products->count();
        $active_product=Product::where('status',1)->count();
        $inactive_product=Product::where('status',0)->count();

        return view('admin.products',compact('categories','products','total_product','active_product','inactive_product'));
    }

    public function add_product(Request $request){
        if($request->isMethod('post')){

            $validated = $request->validate([
                'name'=>'required',
                'price'=>'required',
                'badge'=>'nullable|string',
                'content'=>'required',

                // 👉 image validation add kar
                'image1' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'video' => 'nullable|mimes:mp4,webm|max:10240', // 10MB
            ]); 

            $slug = Str::slug($validated['name']);
            $originalSlug = $slug;
            $count = 1;

            while (Product::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $product = Product::create([
                'category_id' => $request->input('category_id'), 
                'name' => $validated['name'],
                'slug' => $slug,
                'price' => $validated['price'], 
                'badge' => $validated['badge'], 
                'description'=> $validated['content'],
                'status' => $request->input('status')
            ]);

            
            $folder = 'fleets';

            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $imageFields = ['image1','video'];

            foreach ($imageFields as $field) {

                if ($request->hasFile($field)) {

                    $file = $request->file($field);

                    $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                    Storage::disk('public')->putFileAs($folder, $file, $imageName);

                    $product->update([$field => 'fleets/' . $imageName]);
                }
            }

            if($product){
                return response()->json([
                    'status'=>true,
                    'message'=>'Fleet added successfully'
                ]);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Failed to add Fleet'
                ]);
            }
        }
    }

    public function edit_product(Request $request, $id){

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'name'=>'required',
                'price'=>'required',
                'badge'=>'nullable|string',
                'content'=>'required',

                // multiple image validation
                'image1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'video' => 'nullable|mimes:mp4,webm|max:10240', // 10MB
                
            ]);

            $product = Product::findOrFail($id);

            // 🔥 slug logic same
            $slug = $product->slug;

            if (trim($request->name) !== trim($product->name)) {
                $slug = Str::slug($request->name);
                $originalSlug = $slug;
                $count = 1;

                while (
                    Product::where('slug', $slug)
                        ->where('id', '!=', $product->id)
                        ->exists()
                ) {
                    $slug = $originalSlug . '-' . $count;
                    $count++;
                }
            }

            // 🔥 multiple image logic
            $images = [];

            foreach (['image1', 'video'] as $imgField) {

                $images[$imgField] = $product->$imgField; // old image

                if ($request->hasFile($imgField)) {

                    $file = $request->file($imgField);
                    $folder = 'fleets';

                    if (!Storage::disk('public')->exists($folder)) {
                        Storage::disk('public')->makeDirectory($folder);
                    }

                    $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                    Storage::disk('public')->putFileAs($folder, $file, $imageName);

                    // delete old image
                    if ($product->$imgField && Storage::disk('public')->exists($product->$imgField)) {
                        Storage::disk('public')->delete($product->$imgField);
                    }

                    $images[$imgField] = $folder . '/' . $imageName;
                }
            }

            // 🔥 update
            $product->update([
                'category_id' => $request->input('category_id'),
                'name'        => $validated['name'],
                'slug'        => $slug,
                'price'       => $validated['price'],
                'badge'       => $validated['badge'],
                'description' => $validated['content'],
                'status'      => $request->input('status'),

                'image1' => $images['image1'],
                'video' => $images['video'],
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Fleet updated successfully!'
            ]);
        }

        $product = Product::with('category')->findOrFail($id);

        return response()->json([
            'product' => $product
        ]);
    }
    
    
    public function delete_product($id){

        $product = Product::findOrFail($id);

        foreach (['image1', 'video' ] as $imgField) {

            if ($product->$imgField && Storage::disk('public')->exists($product->$imgField)) {
                Storage::disk('public')->delete($product->$imgField);
            }
        }

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Fleet deleted successfully'
        ]);
    }


}
