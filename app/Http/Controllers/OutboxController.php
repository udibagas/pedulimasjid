<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\OutboxRequest;
use App\Outbox;
use App\Inbox;

class OutboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('outbox.create', [
            'inbox' => Inbox::find($request->inbox_id),
            'outbox' => new Outbox(['inbox_id' => $request->inbox_id])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OutboxRequest $request)
    {
        $outbox = Outbox::create($request->all());
        $inbox = $outbox->inbox;
        $inbox->status = Inbox::STATUS_REPLIED;
        $inbox->save();

        \Mail::send('email.outbox', [
                'outbox' => $outbox, 'inbox' => $inbox
            ], function ($m) use ($inbox) {
                $m->to($inbox->email, $inbox->name)->subject('Re: '.$inbox->subject);
            }
        );

        return redirect('/inbox/'.$inbox->id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outbox $outox)
    {
        $outbox->delete();
        return redirect('/inbox/admin');
    }
}
