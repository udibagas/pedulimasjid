<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\InboxRequest;
use App\Inbox;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inbox.index', [
            'inboxes' => Inbox::latest()->paginate(),
            'inbox' => new Inbox
        ]);
    }

    public function admin(Request $request)
    {
        return view('inbox.admin', [
            'inboxes' => Inbox::when($request->q, function($query) use ($request) {
                            return $query->where('name', 'LIKE', '%'.$request->q.'%')
                                        ->orWhere('email', 'LIKE', '%'.$request->q.'%')
                                        ->orWhere('subject', 'LIKE', '%'.$request->q.'%')
                                        ->orWhere('body', 'LIKE', '%'.$request->q.'%');
                        })->latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inbox.create', ['inbox' => new Inbox]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InboxRequest $request)
    {
        $inbox = Inbox::create($request->all());

        // kirim email disini
        \Mail::send('email.inbox', ['inbox' => $inbox], function ($m) use ($inbox) {
                $m->to('admin@salwapedulimasj.id', 'Salwa Peduli Masjid')->subject($inbox->subject);
            }
        );

        return redirect('/inbox');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $inbox)
    {
        if ($inbox->status == Inbox::STATUS_UNREAD)
        {
            $inbox->status = Inbox::STATUS_READ;
            $inbox->save();
        }

        return view('inbox.show', ['inbox' => $inbox]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Inbox $inbox)
    {
        return view('inbox.edit', ['inbox' => $inbox]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InboxRequest $request, Inbox $inbox)
    {
        $inbox->update($request->all());
        // kirim email disini
        return redirect('/inbox');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inbox $inbox)
    {
        $inbox->delete();
        return redirect('/inbox/admin');
    }
}
