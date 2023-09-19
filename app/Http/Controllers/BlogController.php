<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function create(Request $request)
    {
        // validations
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = new Blog();
        if (isset(request()->image)) {
            $file_name = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('Images'), $file_name);
            $blog->image = $file_name;
        }
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = Auth::user()->id;
        $blog->save();
        return redirect()->route('dashboard')->with('success', 'Blog Başarılı Şekilde Oluşturuldu.');
    }

    public function index($blogId)
    {
        $blog = Blog::where('id', $blogId)->get();
        $comments = $this->getBlogComments($blogId);
        return view('blog', ['blogs' => $blog, 'comments' => $comments]);
    }

    public function getBlogComments($blogId)
    {
        $data = Comment::where('blog_id', $blogId)->with('users')->get();
        return $data;
    }


    public function delete($id)
    {
        $blog = Blog::where('id', $id)->where('user_id', Auth::user()->id)->get();
        if (Auth::user()->user_type === "admin" || count($blog) > 0) {
            //blogCommentsDelete
            Comment::where('blog_id', $id)->delete();
            //Blog Delete
            Blog::where('id', $id)->delete();
        }
        return redirect('/dashboard');
    }

}
