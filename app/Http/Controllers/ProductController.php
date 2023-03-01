<?php

namespace App\Http\Controllers;

use Redirect;
use response;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\CommentReply;

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
                'category' => 'required',
                'subcategory' => 'required',
            ],
            [
                'name.required' => 'Must have a product name',
                'price.required' => 'Must enter a price',
                'description.required' => 'Must describe this product',
                'imageFile.required' => 'Must upload an image of the product',
                'category.required' => 'Must pick a category',
                'subcategory.required' => 'Must pick a subcategory',
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
                    'product_img' => $fileName,
                    'product_imgpath' => $productImgPath,
                    'description' => $request->description,
                    'category_id' => $request->category,
                    'subcategory_id' => $request->subcategory,
                ]);

                return Redirect('categorylist/list')
                           ->with('success', 'Product added successfully.');
            }

        }

        return Redirect('userauth/login')
                   ->with('You must be logged in!');

    }

    /**
     * Method for comprehensive detail on the product
     */
    public function showProductDtail(Product $productId) {

        // access the Comment model
        $comments = Comment::where('product_id','=', $productId->id)->get();
        $commentreplies = CommentReply::where('product_id', '=', $productId->id)->get();
        // dd($commentreplies);

        return view('frontend.productview.detail', [
            'product' => $productId,
            'comments' => $comments,
            'commentreplies' => $commentreplies,
        ]);
    }

    /**
     * Method for addToCart functionality
    */
    public function addToCart($id) {

        // $product = Product::find($request->input('product_id'));
        // $options = $request->except('_token', 'product_id', 'price', 'qty');

        // Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

        // \Cart::add([
        //     'id' => $request->product_id,
        //     'name' => $request->name,
        //     'price' => $request->price,
        //     'quantity' => $request->qty,
        //     'attributes' => array(
        //         'image' => $request->product_img,
        //     )

        // ]);

        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_name" => $product->name,
                "product_image" => $product->product_img,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        // session()->flash('success', 'Product is Added to Cart Successfully!');
        session()->put('cart', $cart);
        session()->flash('success', 'Product is Added to Cart Successfully!');

        return redirect()->route('checkout.cart');
        // return view('frontend.productview.cart');
    }

}
