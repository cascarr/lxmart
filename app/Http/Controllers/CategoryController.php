<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Subcategory;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoryController extends Controller
{
    /**
     * Display a listing of the category items
     *
     * @return void
     */
    public function index() {

        $categories = Category::all();
        $dsubcategories = Subcategory::all();

        return view('frontend.categories.index', [
            'categories' => $categories
        ]);

    }

    /**
     * Retrieve all subcategories depending on the
     * category selected.
    */
    public function dbsubcategories(Request $request) {

        if (!$request->category_id) {
            $html = '<option value="">Pick subcategory</option>';
        } else {
            $html = '';
            $subcategories = Subcategory::where('category_id', $request->category_id)->get();

            foreach ($subcategories as $subcategory) {
                $html .= '<option value="'.$subcategory->id.'">'.$subcategory->name.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }

    /**
     * Ajax functionality for creating Category
     */
    public function storeCategory(Request $request) {

        $request->validate(
            [
                'name' => 'required|max:255',
            ],
            [
                'name.required' => 'A Category name is required'
            ]
        );

        // Only commit only if this is an Auth User
        if (Auth::check()) {

            /**
             * checks if a data with the user entered
             * input 'name' already exists in the DB
             */
            if (DB::table('categories')->where('name', $request->name)->exists()) {

                // redirect if already exists
                return Redirect('categorylist/list')
                           ->with('error', 'This Category name already exists.');

            } else {
                # commit if not in database...
                $newCatItem = Category::create([
                    'name' => $request->name,
                    'slug' => SlugService::createSlug(Category::class, 'slug', $request->name),
                ]);

                return Redirect('categorylist/list')->with('success', 'Category Item added successfully.');
            }



        }

        return Redirect('userauth/login')->withSuccess('You must be logged in!');

    }

}
