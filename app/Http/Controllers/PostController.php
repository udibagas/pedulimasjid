<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostRequest;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index', [
            'posts' => Post::ofStatus(Post::STATUS_PUBLISHED)->ofType('post')->latest()->paginate()
        ]);
    }

    public function admin(Request $request)
    {
        return view('post.admin', [
            'posts' => Post::when($request->q, function($query) use ($request) {
                        return $query->where('title', 'LIKE', '%'.str_replace(' ', '%', $request->q).'%');
                    })->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create', ['post' => new Post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        if ($request->hasFile('img')) {

            $file = $request->file('img');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/images/', $fileName);
            $data['img'] = 'uploads/images/'.$fileName;
        }

        $post = Post::create($data);
        return redirect('/post/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $view = ($post->type == Post::TYPE_PAGE ) ? 'post.show-page' : 'post.show-post';
        $related = ($post->type == Post::TYPE_POST )
            ? Post::ofType('post')->ofStatus(Post::STATUS_PUBLISHED)
                    ->whereNotIn('id', [$post->id])
                    ->where('category_id', $post->category_id)
                    ->limit(4)->latest()->get()
            : null;

        return view($view, [
            'post' => $post,
            'related' => $related
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {

            $file = $request->file('img');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/images/', $fileName);
            $data['img'] = 'uploads/images/'.$fileName;

            if ($post->img && file_exists($post->img)) {
    			unlink($post->img);
    		}
        }

        $post->update($data);
        return redirect('/post/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        if ($post->img && file_exists($post->img)) {
            unlink($post->img);
        }

        return redirect('/post/admin');
    }
}
