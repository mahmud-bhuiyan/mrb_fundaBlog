<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;

use App\Models\Comments;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function createComment(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'comments_body' => 'required|string'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('message', 'Comment area mandatory');
            }

            $post = Post::where('slug', $request->post_slug)->where('status', '1')->first();

            if ($post) {
                Comments::create([
                    'post_id' => $post->id,
                    'user_id' => Auth::user()->id,
                    'comments_body' => $request->comments_body
                ]);
                return redirect()->back()->with('success_message', 'Thanks for your comment!');
            } else {
                return redirect()->back()->with('message', 'No such post found!');
            }
        } else {
            return redirect('login')->with('message', 'Login in first to comment');
        }
    }

    public function deleteComment(Request $request)
    {
        if (Auth::check()) {
            $comment = Comments::where('id', $request->comment_id)
                ->where('user_id', Auth::user()->id)
                ->first();

            if ($comment) {

                $comment->delete();

                return response()->json([
                    'status' => 200,
                    'message' => 'Comment Deleted Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something went wrong!'
                ]);
            }
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Login to Delete this Comment'
            ]);
        }

        // return redirect()->back()->with('message', 'Comment Successfully Deleted');
    }
}
