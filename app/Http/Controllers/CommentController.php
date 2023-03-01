<?php

namespace App\Http\Controllers;

use Redirect;
use response;

use App\Models\Product;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CommentController extends Controller
{
    //
    /**
     * Method for Ajax functionality for adding
     * comment
    */
    public function storeComment(Request $request) {

        if (Auth::check()) {

            // validating the user entered input
            $request->validate([
                'body' => 'required',
            ]);

            // retrieving all data from the fields
            $data = $request->all();
            $data['user_id'] = Auth::id();

            // storing the data in the database
            Comment::create($data);

            return redirect()->back();

        }

        return redirect('login')
              ->withSuccess('You are\'t allowed to continue. ');

    }

}
