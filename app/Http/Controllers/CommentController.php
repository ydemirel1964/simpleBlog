<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function create(Request $request)
    {
        $blogId = $request->blogId;
        $comment = $request->comment;
        $userid = Auth::user()->id;
        Comment::Create(
            [
                'comment' => "$comment",
                'blog_id' => "$blogId",
                'user_id' => $userid
            ]
        );
        return redirect('blog/' . $blogId)->with('success', 'Yorum Başarılı Şekilde Oluşturuldu.');
    }

    public function delete($id)
    {
        $comment = Comment::where('id', $id)->where('user_id', Auth::user()->id)->get();
        $blogId = Comment::where('id', $id)->select('blog_id')->get();
        info($blogId);
        if (Auth::user()->user_type === "admin" || count($comment) > 0) {
            //blogCommentsDelete
            Comment::where('id', $id)->delete();
        }
        if (count($blogId) > 0) {
            return redirect('/blog/' . $blogId[0]['blog_id']);
        } else {
            return redirect('/dashboard');
        }
    }
}
