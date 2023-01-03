<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function postIndex()
    {
        $posts = Post::all();
        return view('admin.post.postIndex', compact('posts'));
    }

    public function postAdd()
    {
        $category = Category::where('status', '1')->get();
        return view('admin.post.postAdd', compact('category'));
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required',
            'yt_iframe' => 'nullable|max:255',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:255',
            'meta_keyword' => 'nullable|max:255',
        ]);

        $post = new Post;

        $post->category_id = $request->category_id;
        $post->name = $request->name;

        $post->slug = Str::slug($request->slug);
        $post->description = $request->description;

        $post->yt_iframe = $request->yt_iframe;
        $post->meta_title = $request->meta_title;

        $post->meta_description = $request->meta_description;
        $post->meta_keyword = $request->meta_keyword;

        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;

        $post->save();

        return redirect('admin/post')->with('message', 'Post Added Successfully');
    }

    public function postEdit($post_id)
    {
        $post = Post::find($post_id);
        $category = Category::where('status', '1')->get();
        return view('admin.post.postEdit', compact('post', 'category'));
    }

    public function postUpdate(Request $request, $post_id)
    {
        $post = Post::find($post_id);

        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:255',
            'meta_keyword' => 'nullable|max:255',
        ]);

        $post->category_id = $request->category_id;
        $post->name = $request->name;

        $post->slug = Str::slug($request->slug);
        $post->description = $request->description;

        $post->yt_iframe = $request->yt_iframe;
        $post->meta_title = $request->meta_title;

        $post->meta_description = $request->meta_description;
        $post->meta_keyword = $request->meta_keyword;

        $post->status = $request->status == true ? '1' : '0';
        $post->created_by = Auth::user()->id;

        $post->update();

        return redirect('admin/post')->with('message', 'Post Updated Successfully');
    }

    public function postDelete(Request $request)
    {
        $post = Post::find($request->post_delete_id);

        if ($post) {
            $post->delete();
            return redirect('admin/post')->with('message', 'Post Deleted Successfully');
        } else {
            return redirect('admin/post')->with('message', 'No Data Found!!');
        }
    }
}
