<?php

namespace App\Http\Controllers;

use Redirect;
use response;

use App\Models\Product;
use App\Models\Comment;
use App\Models\CommentReply;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CommentReplyController extends Controller
{
    //
    /**
     * AJAX functionality for adding comment's reply
    */
    public function storeCommentReply(Request $request) {

        if (Auth::check()) {

            // Validating the user entered input
            $request->validate([
                'body' => 'required',
            ]);

            // Retieving all data from the fields
            $data = $request->all();
            $data['user_id'] = Auth::id();

            // Storing the data in the database
            CommentReply::create($data);

            return redirect()->back();

        }

        return redirect('login')
              ->with('You are\'t allowed to continue...');

    }

}
