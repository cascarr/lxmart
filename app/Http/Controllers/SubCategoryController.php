<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SubCategoryController extends Controller
{

    //
    /**
     * Ajax functionality for creating Subcategory
     */
    public function storeSubCategory(Request $request) {
        // validating user entered inputs
        $request->validate(
            [
                'name' => 'required|max:255',
                'category' => 'required',
            ],
            [
                'name.required' => 'You must have a Subcategory name.',
                'category.required' => 'You must pick a category'
            ]
        );

        // Only commit only if this is an Auth User
        if (Auth::check()) {

            /**
             * Checks if a subcategory name with same
             * input value already exist in the database.
             */
            if (DB::table('subcategories')->where('name', $request->name)->exists()) {

                // redirect if already exists
                return Redirect('categorylist/list/')
                           ->with('error', 'This Subcategory name already exists.');

            } else {
                // Save to the database if not already exist.
                $newSubCatItem = Subcategory::create([
                    'name' => $request->name,
                    'slug' => SlugService::createSlug(Subcategory::class, 'slug', $request->name),
                    'category_id' => $request->category,
                ]);

                return Redirect('categorylist/list/')->with('success', 'Subcategory Item added successfully.');
            }



        }

        return Redirect('userauth/login')->withSuccess('You must be logged in!');

    }

}
