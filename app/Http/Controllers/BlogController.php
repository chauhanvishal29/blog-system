<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\blogComment;


class BlogController extends Controller
{
    public function index(Blogs $blog)
    {
        $blogs = $blog->all();
        return view('blog.index',compact('blogs'));
    }

    public function addBlog()
    {
        return view('blog.create');
    }

    public function StoreBlog(Request $request)
    {
        $request->validate([
            "title" => "required",
            "description" => "required",
        ]);

        $create = [
            "title" => $request->title,
            "descr" => $request->description,
        ];
        Blogs::create($create);
        return redirect(route('blog'))->with('success', 'Blog Create successfully');
    }

    public function blogDetail($id)
    {
        $blog = Blogs::with('comments.user')->find($id);
        if (!$blog) {
            // Handle the case when the blog with the given ID is not found.
            return response()->json(['error' => 'Blog not found'], 404);
        }
        return view('blog.blog-detail', compact('blog'));
    }

    public function BlogPostComment(Request $request)
    {
        $request->validate([
            "comment" => 'required'
        ]);

        $store = [
            "user_id" => auth()->id(),
            "blog_id" => $request->blog_id,
            "comment" => $request->comment,
        ];
        blogComment::create($store);
        return back()->with('success', 'Comment added successfully');
    }
    
}
