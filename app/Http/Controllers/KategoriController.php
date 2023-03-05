<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        // $kategoris = Kategori::all();
        $kategoris = Kategori::paginate(5);
        return view('kategori.index', compact('kategoris'));
    }

    /**
    * Show the form for creating a new resource.
    *
    //  * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \App\Http\Requests\StoreKategoriRequest  $request
    //  * @return \Illuminate\Http\Response
    */
    public function store(StoreKategoriRequest $request)
    {
        $kategoris = Kategori::create([
            'kode_kategori' => 'CTG/20230821/003',
            'kategori' => $request->kategori
        ]);
        return redirect()->back();
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Kategori  $kategori
    //  * @return \Illuminate\Http\Response
    */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    // * @param  \App\Models\Kategori  $kategoris
    //  * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $kategoris = Kategori::findOrFail($id);
        // dd($kategoris->kode_kategori);
        return view('kategori.edit', compact('kategoris'));

    }

    /**
    * Update the specified resource in storage.
    *
    // * @param  \App\Http\Requests\UpdateKategoriRequest  $request
    * @param  \App\Models\Kategori  $kategori
    //  * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $kategoris = Kategori::findOrFail($id);
        // $kategoris->update([
        //     'kategori' => $request->nama
        // ]);
        $kategoris->kategori = $request->nama;
        $kategoris->save();
        return redirect()->back();
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Kategori  $kategori
    //  * @return \Illuminate\Http\Response
    */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->back();
    }
}