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
        
        $products=Product::with('category')->orderBy('sort_order')->get();

        $total_product=$products->count();
        $active_product=Product::where('status',1)->count();
        $inactive_product=Product::where('status',0)->count();

        return view('admin.products',compact('categories','products','total_product','active_product','inactive_product'));
    }

    public function add_product(Request $request){
        if($request->isMethod('post')){
            // dd($request);

            $validated = $request->validate([
                'name'=>'required',
                'price'=>'nullable',
                'badge'=>'nullable|string',
                'content'=>'required',
                'specification'=>'nullable',
                'rating'=>'nullable',
                'sort_order'=>'required',

                // 👉 image validation add kar
                'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp,svg',
                'video' => 'nullable|mimes:mp4,webm', // 10MB
                'gallery_image' => 'nullable|array',
                'gallery_image.*' => 'image|mimes:jpg,jpeg,png,gif,webp,svg'
                
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
                'sort_order' => $validated['sort_order'], 
                'name' => $validated['name'],
                'slug' => $slug,
                'price' => $validated['price'], 
                'badge' =>  $request->input('badge'), 
                'description'=> $validated['content'],
                'specification'=> $validated['specification'],
                'rating'=> $validated['rating'],
                'status' => $request->input('status')
            ]);

            
            $folder = 'fleets';

            if (!Storage::disk('public')->exists($folder)) {
                Storage::disk('public')->makeDirectory($folder);
            }

            $imageFields = ['image','video'];

            foreach ($imageFields as $field) {

                if ($request->hasFile($field)) {

                    $file = $request->file($field);

                    $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                    Storage::disk('public')->putFileAs($folder, $file, $imageName);

                    $product->update([$field => 'fleets/' . $imageName]);
                }
            }

            $galleryPaths = [];

            if ($request->hasFile('gallery_image')) {
                foreach ($request->file('gallery_image') as $file) {
                    $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                    Storage::disk('public')->putFileAs($folder, $file, $imageName);

                    $galleryPaths[] = 'fleets/' . $imageName;
                }
            }

            if (!empty($galleryPaths)) {
                $product->update([
                    // 'gallery_images' => json_encode($galleryPaths)
                    'gallery_images' => $galleryPaths
                ]);
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
        // dd($request->file('image'));

        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'name'=>'required',
                'price'=>'nullable',
                'badge'=>'nullable|string',
                'rating'=>'nullable',
                'content'=>'required',
                'specification'=>'nullable',
                'sort_order'=>'required',

                // multiple image validation
                'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp,svg',
                'video' => 'nullable|mimes:mp4,webm', // 10MB
                'gallery_image' => 'nullable|array',
                'gallery_image.*' => 'image|mimes:jpg,jpeg,png,gif,webp,svg'
                
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

            // old gallery images
            $galleryPaths = $product->gallery_images ?? [];

            foreach (['image', 'video'] as $imgField) {

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

            // gallery images upload
            if ($request->hasFile('gallery_image')) {

                $folder = 'fleets';

                if (!Storage::disk('public')->exists($folder)) {
                    Storage::disk('public')->makeDirectory($folder);
                }

                // old gallery delete
                if (!empty($product->gallery_images)) {

                    foreach ($product->gallery_images as $oldImage) {

                        if (Storage::disk('public')->exists($oldImage)) {
                            Storage::disk('public')->delete($oldImage);
                        }
                    }
                }

                // upload new gallery
                $galleryPaths = [];

                foreach ($request->file('gallery_image') as $file) {

                    $imageName = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();

                    Storage::disk('public')->putFileAs($folder, $file, $imageName);

                    $galleryPaths[] = $folder . '/' . $imageName;
                }
            }

            // 🔥 update
            $product->update([
                'category_id' => $request->input('category_id'),
                'sort_order' => $validated['sort_order'], 
                'name'        => $validated['name'],
                'slug'        => $slug,
                'price'       => $validated['price'],
                'badge'       => $validated['badge'] ?? null,
                'rating'       => $validated['rating'],
                'description' => $validated['content'],
                'specification' => $validated['specification'],
                'status'      => $request->input('status'),
                'image' => $images['image'],
                'gallery_images' => $galleryPaths,
                'video' => $images['video'],
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Fleet updated successfully!'
            ]);
        }

        $product = Product::with('category')->findOrFail($id);

        // dd($product);

        return response()->json([
            'product' => $product

        ]);
    }
    
    
    public function delete_product($id)
    {
        $product = Product::findOrFail($id);

        // delete single image & video
        foreach (['image', 'video'] as $imgField) {

            if (
                $product->$imgField &&
                Storage::disk('public')->exists($product->$imgField)
            ) {
                Storage::disk('public')->delete($product->$imgField);
            }
        }

        // delete gallery images
        if (!empty($product->gallery_images)) {

            foreach ($product->gallery_images as $galleryImage) {

                if (Storage::disk('public')->exists($galleryImage)) {
                    Storage::disk('public')->delete($galleryImage);
                }
            }
        }

        // delete product
        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Fleet deleted successfully'
        ]);
    }


}
