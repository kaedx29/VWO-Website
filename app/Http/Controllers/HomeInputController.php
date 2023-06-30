<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class HomeInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'imageBesar' => 'image', 'description' => 'required', 'titleKecil' => 'required', 'imageKecil' => 'image', 'descriptionKecil' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('imageBesar')) {

            $destinationPath = 'image/';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['imageBesar'] = $imageName;
        }
        if ($image = $request->file('imageKecil')) {

            $destinationPath = 'image/';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['imageKecil'] = $imageName;
        }

        Slider::create($input);

        return redirect('admin/sliders')->with('message', 'Data berhasil ditambahkan');
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
    public function edit(Slider $slider)
    {
        return view('slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'imageBesar' => 'image', 'description' => 'required', 'titleKecil' => 'required', 'imageKecil' => 'image', 'descriptionKecil' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('imageBesar')) {
            $destinationPath = 'images/';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['imageBesar'] = $imageName;
        } else {
            unset($input['imageBesar']);
        }

        if ($image = $request->file('imageKecil')) {
            $destinationPath = 'images/';
            $imageName = $image->getClientOriginalName();
            $image->move($destinationPath, $imageName);
            $input['imageKecil'] = $imageName;
        } else {
            unset($input['imageKecil']);
        }


        $slider->update($input);

        return redirect('admin/sliders')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $image_path = '/image';

        if (file_exists($image_path)) {

            unlink($image_path);
        }
        $slider->delete();

        return redirect('admin/sliders')->with('message', 'Data berhasil dihapus');
    }
}
