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
        $donasis = Donasi::when($request->tanggal, function($query) use ($request) {
                        return $query->whereRaw('DAY(tanggal) = '.$request->tanggal);
                    })->when($request->bulan, function($query) use ($request) {
                        return $query->whereRaw('MONTH(tanggal) = '.$request->bulan);
                    })->when($request->tahun, function($query) use ($request) {
                        return $query->whereRaw('YEAR(tanggal) = '.$request->tahun);
                    })->when($request->donatur, function($query) use ($request) {
                        return $query->where('donatur', 'LIKE', '%'.$request->donatur.'%');
                    })->when($request->alokasi, function($query) use ($request) {
                        return $query->where('alokasi', 'LIKE', '%'.$request->alokasi.'%');
                    })->when($request->keterangan, function($query) use ($request) {
                        return $query->where('keterangan', 'LIKE', '%'.$request->keterangan.'%');
                    })->when($request->jenis, function($query) use ($request) {
                        return $query->ofJenis($request->jenis);
                    })->latest()->get();

        $perMonth = Donasi::selectRaw('DATE_FORMAT(tanggal, "%M") as bulan, SUM(jumlah) as jumlah')->groupBy('bulan')->get();
        $perYear = Donasi::selectRaw('YEAR(tanggal) as tahun, SUM(jumlah) as jumlah')->groupBy('tahun')->get();
        $perJenis = Donasi::selectRaw('jenis, SUM(jumlah) as jumlah')->groupBy('jenis')->get();

        return view('donasi.index', [
            'donasis' => $donasis,
            'perMonth' => $perMonth,
            'perYear' => $perYear,
            'perJenis' => $perJenis,
        ]);
    }

    public function admin(Request $request)
    {
        return view('donasi.admin', [
            'donasis' => Donasi::when($request->tanggal, function($query) use ($request) {
                            return $query->whereRaw('DAY(tanggal) = '.$request->tanggal);
                        })->when($request->bulan, function($query) use ($request) {
                            return $query->whereRaw('MONTH(tanggal) = '.$request->bulan);
                        })->when($request->tahun, function($query) use ($request) {
                            return $query->whereRaw('YEAR(tanggal) = '.$request->tahun);
                        })->when($request->donatur, function($query) use ($request) {
                            return $query->where('donatur', 'LIKE', '%'.$request->donatur.'%');
                        })->when($request->alokasi, function($query) use ($request) {
                            return $query->where('alokasi', 'LIKE', '%'.$request->alokasi.'%');
                        })->when($request->keterangan, function($query) use ($request) {
                            return $query->where('keterangan', 'LIKE', '%'.$request->keterangan.'%');
                        })->when($request->jenis, function($query) use ($request) {
                            return $query->ofJenis($request->jenis);
                        })->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donasi.create', [
            'donasi' => new Donasi(['tanggal' => date('Y-m-d')])
        ]);
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
        return redirect('/donasi/admin');
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
        return redirect('/donasi/admin');
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
