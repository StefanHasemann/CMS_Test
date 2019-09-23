<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Zend\Diactoros\UploadedFile;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3'],
            'path' => 'required|file|image|max:1999'
        ]);

        // Handle file upload
        if ($request->hasFile('path')) {
            $fileNameExt = $request->file('path')->getClientOriginalName();
            // Get just fileName
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('path')->getClientOriginalExtension();
            // Filename to store without override possibility because of timestamp
            $fileNameToStore = $fileName . $extension;
            // Upload image
            $path = $request->file('path')->store('images', 'public');

            // sets array->path to $path
            Arr::set($attributes, 'path', $path);
        }

        Image::create($attributes);

        return redirect('/images/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
