<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\MasjidRequest;
use App\Masjid;

class MasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('masjid.index', [
            'masjids' => Masjid::when($request->q, function($query) use ($request) {
                            return $query->where('nama', 'LIKE', '%'.$request->q.'%');
                        })->paginate()
        ]);
    }

    public function admin(Request $request)
    {
        return view('masjid.admin', [
            'masjids' => Masjid::when($request->q, function($query) use ($request) {
                            return $query->where('nama', 'LIKE', '%'.$request->q.'%');
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
        return view('masjid.create', ['masjid' => new Masjid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/images/', $fileName);
            $data['img'] = 'uploads/images/'.$fileName;
        }

        Masjid::create($data);
        return redirect('/masjid/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Masjid $masjid)
    {
        return view('masjid.show', ['masjid' => $masjid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Masjid $masjid)
    {
        return view('masjid.edit', ['masjid' => $masjid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MasjidRequest $request, Masjid $masjid)
    {
        $data = $request->all();

        if ($request->hasFile('img'))
        {
            $file = $request->file('img');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/images/', $fileName);
            $data['img'] = 'uploads/images/'.$fileName;

            if ($masjid->img && file_exists($masjid->img)) {
    			unlink($masjid->img);
    		}
        }

        $masjid->update($data);
        return redirect('/masjid/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masjid $masjid)
    {
        $masjid->delete();
        return redirect('/masjid/admin');
    }
}
