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
                'stock'=>'required',
                'price'=>'required',
                'content'=>'required',

                // 👉 image validation add kar
                'image1' => 'required|image|mimes:jpg,jpeg,png|max:2048',
                'video' => 'nullable|mimes:mp4,webm|max:10240', // 10MB
                'image2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'image3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'image4' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
                'stock' => $validated['stock'],
                'price' => $validated['price'], 
                'description'=> $validated['content'],
                'is_trending' => $request->input('trending'),
                'new_arrival' => $request->input('new_arrival'),
                'status' => $request->input('status')
            ]);

            
            $folder = 'products';

            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $imageFields = ['image1','video' ,'image2', 'image3', 'image4'];

            foreach ($imageFields as $field) {

                if ($request->hasFile($field)) {

                    $file = $request->file($field);

                    $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                    Storage::disk('public')->putFileAs($folder, $file, $imageName);

                    $product->update([$field => 'products/' . $imageName]);
                }
            }

            if($product){
                return response()->json([
                    'status'=>true,
                    'message'=>'Product added successfully'
                ]);
            }else{
                return response()->json([
                    'status'=>false,
                    'message'=>'Failed to add Product'
                ]);
            }
        }
    }

    public function edit_product(Request $request, $id){

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'name'   => 'required',
                'stock'  => 'required',
                'price'  => 'required',
                'content'=> 'required',

                // multiple image validation
                'image1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'video' => 'nullable|mimes:mp4,webm|max:10240', // 10MB
                'image2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'image3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'image4' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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

            foreach (['image1', 'video' ,'image2','image3','image4'] as $imgField) {

                $images[$imgField] = $product->$imgField; // old image

                if ($request->hasFile($imgField)) {

                    $file = $request->file($imgField);
                    $folder = 'products';

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
                'stock'       => $validated['stock'],
                'price'       => $validated['price'],
                'description' => $validated['content'],
                'is_trending' => $request->input('trending'),
                'new_arrival' => $request->input('new_arrival'),
                'status'      => $request->input('status'),

                'image1' => $images['image1'],
                'video' => $images['video'],
                'image2' => $images['image2'],
                'image3' => $images['image3'],
                'image4' => $images['image4'],
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Product updated successfully!'
            ]);
        }

        $product = Product::with('category')->findOrFail($id);

        return response()->json([
            'product' => $product
        ]);
    }
    
    
    public function delete_product($id){

        $product = Product::findOrFail($id);

        foreach (['image1', 'video' ,'image2','image3','image4'] as $imgField) {

            if ($product->$imgField && Storage::disk('public')->exists($product->$imgField)) {
                Storage::disk('public')->delete($product->$imgField);
            }
        }

        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully'
        ]);
    }


}
