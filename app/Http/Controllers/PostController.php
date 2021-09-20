<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('post.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        if ($request->hasFile('image')) {
            // get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // get file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            //upload image
            $request->image->storeAs('public\post_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }
        Post::create(
            [

                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'image' => $fileNameToStore,
                'category_id' => $request->input('category_id'),
                'published_at' => $request->published_at
            ]
        );

        Session::flash('success', 'Post created successfully');
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.create')->with('post', $post)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'published_at' => $request->input('published_at')
        ]);

        if ($request->hasFile('image')) {
            // get file name with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            // get file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get just file extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            //upload image
            $request->image->storeAs('public\post_images', $fileNameToStore);

            if ($post->image != "noimage.png") {
                Storage::delete('public/post_images/' . $post->image);
            }
            $post->update([
                'image' => $fileNameToStore
            ]);
        }
        Session::flash('success', 'Post updated successfully');
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        if ($post->trashed()) {
            if ($post->image != "noimage.png") {
                Storage::delete('public/post_images/' . $post->image);
            }
            $post->forceDelete();
        } else {
            $post->delete();
        }
        Session::flash('success', 'Post deleted successfully');
        return redirect()->back();
    }

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->latest()->paginate(10);
        return view('post.index')->with('posts', $trashed);
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        $post->restore();

        Session::flash('success', 'Post restored successfully');
        return redirect()->back();
    }
}
