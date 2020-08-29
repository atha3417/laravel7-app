<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::paginate(3);
        return view('komik.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('komik.create');
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
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'cover' => 'image|max:3000'
        ]);
        $imgName = 'default.jpg';
        if ($request->cover) {
            $imgName = explode('.', $request->cover->getClientOriginalName())[0];
            $imgName = $imgName . '-' . time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('img'), $imgName);
        }
        Comic::create([
            'judul' => $request->title,
            'slug' => Str::slug($request->title),
            'penulis' => $request->author,
            'penerbit' => $request->publisher,
            'sampul' => $imgName
        ]);
        return redirect('comic')->with('status', 'New comic successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $comic = Comic::where('slug', $slug)->first();
        return view('komik.detail', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $comic = Comic::where('slug', $slug)->first();
        // dd($comic);
        return view('komik.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'cover' => 'image|max:3000'
        ]);
        $imgName = $request->oldCover;
        if ($request->cover) {
            if ($request->oldCover !== 'default.jpg' && file_exists(public_path("img/" . $request->oldCover))) {
                unlink(public_path("img/" . $request->oldCover));
            }
            $imgName = explode('.', $request->cover->getClientOriginalName())[0];
            $imgName = $imgName . '-' . time() . '.' . $request->cover->extension();
            $request->cover->move(public_path('img'), $imgName);
        }
        Comic::where('slug', $slug)->update([
            'judul' => $request->title,
            'slug' => Str::slug($request->title),
            'penulis' => $request->author,
            'penerbit' => $request->publisher,
            'sampul' => $imgName
        ]);
        return redirect('comic')->with('status', 'Comic successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $comic = Comic::where('slug', $slug)->first();
        if ($comic['sampul'] !== 'default.jpg' && file_exists(public_path("img/" . $comic['sampul']))) {
            unlink(public_path("img/" . $comic['sampul']));
        }
        $comic->delete();
        return redirect('comic')->with('status', $comic['title'] . ' comic successfully deleted!');
    }
}
