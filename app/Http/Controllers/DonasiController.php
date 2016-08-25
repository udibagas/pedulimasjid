<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\DonasiRequest;
use App\Donasi;

class DonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('donasi.index', [
            'donasis' => Donasi::paginate(10)
        ]);
    }

    public function admin(Request $request)
    {
        return view('donasi.admin', [
            'donasis' => Donasi::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donasi.create', ['donasi' => new Donasi(['tanggal' => date('Y-m-d')])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonasiRequest $request)
    {
        Donasi::create($request->all());
        return redirect('/donasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Donasi $donasi)
    {
        return view('donasi.show', [
            'donasi' => $donasi,
            'posts' => $donasi->posts()->paginate()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Donasi $donasi)
    {
        return view('donasi.edit', ['donasi' => $donasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonasiRequest $request, Donasi $donasi)
    {
        $donasi->update($request->all());
        return redirect('/donasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donasi $donasi)
    {
        $donasi->delete();
        return redirect('/donasi');
    }
}
