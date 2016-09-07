<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CommentRequest;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('comment.index', [
            'comments' => Comment::latest()
                            ->when($request->q, function($query) use ($request) {
                                return $query->where('name', 'LIKE', '%'.$request->q.'%')
                                            ->orWhere('email', 'LIKE', '%'.$request->q.'%')
                                            ->orWhere('title', 'LIKE', '%'.$request->q.'%')
                                            ->orWhere('content', 'LIKE', '%'.$request->q.'%');
                            })->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        $comment = Comment::create($request->all());

        \Mail::send('email.comment', ['comment' => $comment], function ($m) use ($comment) {
                $m->setReplyTo([$comment->email => $comment->name]);
                $m->to('lontar.aditya@mail.com', 'Lontar Aditya')->subject('Komentar Baru: '.$comment->title);
            }
        );

        return redirect('/'.$comment->commentable_type.'/'.$comment->commentable_id)
                ->with('success', 'Komentar Anda akan tampil setelah dimoderasi.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('comment.show', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function approve(Request $request, Comment $comment)
    {
        $comment->update(['approved' => 1]);
        return redirect($request->redirect);
    }

    public function unapprove(Request $request, Comment $comment)
    {
        $comment->update(['approved' => 0]);
        return redirect($request->redirect);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comment $comment)
    {
        $comment->delete();
        return redirect($request->redirect);
    }
}
