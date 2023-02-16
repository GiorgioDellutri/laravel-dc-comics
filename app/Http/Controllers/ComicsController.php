<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $request->validate(
            [
                'thumb' => 'required|url|min:4',
                'title' => 'required|min:5|max:100',
                'description' => 'required',
                'price' => 'required',
                'series' => 'required',
                'type' => 'string|max:100|nullable',
                'sale_date' => 'required|date|before_or_equal:today',
            ],
            [
                'thumb.required' => 'Il campo "thumb" è obbligatorio (inserisci un URL)',
                'title.required' => 'Il campo "title" è obbligatorio',
                'description,required' => 'Il campo "descrizione" è obbligatorio',
                'price.required' => 'Il campo "price" è obbligatorio',
                'series.required' => 'Il campo "series" è obbligatorio',
                'price.required' => 'Il campo "price" è obbligatorio',
                'sale_date.required' => 'Il campo "sale date" è obbligatorio, inserisci un formato valido (aaaa/mm/gg)',
            ]
        );

        $newComic = new Comic();
        $newComic->thumb = $data['thumb'];
        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];
        $newComic->save();

        return redirect()->route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comic $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        //
        // $comic = Comic::findOrFail($id);
        return view('comics.edit', compact('comic'));
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
        $formData = $request->all();
        $comic = Comic::findOrFail($id);
        $comic->thumb = $formData['thumb'];
        $comic->title = $formData['title'];
        $comic->description = $formData['description'];
        $comic->price = $formData['price'];
        $comic->series = $formData['series'];
        $comic->sale_date = $formData['sale_date'];
        $comic->type = $formData['type'];
        $comic->update();


        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        //
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
