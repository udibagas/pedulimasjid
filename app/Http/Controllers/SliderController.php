<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SliderRequest;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('slider.index', [
            'sliders' => Slider::when($request->q, function($query) use ($request) {
                            return $query->where('title', 'LIKE', '%'.$request->q.'%');
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
        return view('slider.create', ['slider' => new Slider]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {

            $file = $request->file('img');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/images/', $fileName);
            $data['img'] = 'uploads/images/'.$fileName;
        }

        $slider = Slider::create($data);
        return redirect('/slider');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('slider.show', ['slider' => $slider]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('slider.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        $data = $request->all();

        if ($request->hasFile('img')) {

            $file = $request->file('img');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/images/', $fileName);
            $data['img'] = 'uploads/images/'.$fileName;

            if ($slider->img && file_exists($slider->img)) {
    			unlink($slider->img);
    		}
        }

        $slider->update($data);
        return redirect('/slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        if ($slider->img && file_exists($slider->img)) {
			unlink($slider->img);
		}

        return redirect('/slider');
    }
}
