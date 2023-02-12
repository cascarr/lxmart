<?php

namespace App\Http\Controllers;

use Redirect;
use response;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;

class ProductController extends Controller
{
    //
    /**
     * Method to return view listing all products
    */
    public function index() {

        $products = Product::all();

        return view('welcome', [
            'products' => $products,
        ]);

    }

    

    /**
     * Method for Ajax functionality for adding
     * product
    */
    public function storeProduct(Request $request) {

        // Validating user entered inputs
        $request->validate(
            [
                'name' => 'required|max:255',
                'price' => 'required',
                'description' => 'required',
                'imageFile' => 'required|mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048',
                'category_id' => 'required',
                'subcategory_id' => 'required',
            ],
            [
                'name.required' => 'Must have a product name',
                'price.required' => 'Must enter a price',
                'description.required' => 'Must describe this product',
                'imageFile.required' => 'Must upload an image of the product',
                'category_id.required' => 'Must pick a category',
                'subcategory_id.required' => 'Must pick a subcategory',
            ]
        );

        // Only commit only if this is an Authorized User
        if (Auth::check()) {

            /**
             * Check if we're uploading image
            */
            if ($request->hasfile('imageFile')) {

                $fileName = time().'_'.$request->imageFile->getClientOriginalName();
                $filePath = $request->file('imageFile')->storeAs('uploads', $fileName, 'public');

                $productImgPath = '/storage'. $filePath;

            }

            /**
             * Checks if a product name with same input
             * value already exist in the database.
            */
            if (DB::table('products')->where('name', $request->name)->exists()) {

                // redirects the user back() with a message
                return Redirect('categorylist/list')
                           ->with('error', 'This product name already exists.');

            } else {
                // Save to the database if not already exist.
                $newProduct = Product::create([
                    'name' => $request->name,
                    'slug' => SlugService::createSlug(Product::class, 'slug', $request->name),
                    'price' => $request->price,
                    'description' => $request->description,
                    'product_img' => $productImgPath,
                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                ]);

                return Redirect('categorylist/list')
                           ->with('success', 'Product added successfully.');
            }

        }

        return Redirect('userauth/login')
                   ->with('You must be logged in!');

    }

}
