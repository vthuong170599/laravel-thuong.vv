<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Position;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * get list post
     * @return blade index in folde post
     */
    public function index()
    {
        $Post = Post::with('getAllPost')->get();
        return view('post.index',compact('Post'));
    }

    /**
     * get form create post
     */
    public function create()
    {
        $category = Category::all();
        return view('post.addPost', compact('category'));
    }

    /**
     * add post
     * @param request validation of post
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        if ($post) {
            return redirect()->route('post.index')->with('success', 'insert successfully');
        }
    }

    /**
     * get form edit post
     * @param id of Post edit
     */
    public function update($id){
        $category = Category::all();
        $Post = Post::find($id);
        return view('post.editPost',compact('category','Post'));
    }

    /**
     * update Post
     * @param request validate of edit Post
     * @param id of Post edit
     */
    public function edit(Request $request,$id){
        Post::find($id)->update($request->all());
        return redirect()->route('post.index')->with('success', 'update successfully');
    }

    public function delete($id){
        Post::find($id)->delete();
        return redirect()->route('post.index');
    }
}
