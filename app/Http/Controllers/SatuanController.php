<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSatuanRequest;
use App\Http\Requests\UpdateSatuanRequest;
use App\Models\Satuan;

class SatuanController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    //  * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $satuans = Satuan::paginate(5);
        // $satuans = Satuan::all();
        return view('satuan.index', compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSatuanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSatuanRequest $request)
    {
        $satuans = Satuan::create([
            'kode_satuan' => 'STN/20230821/003',
            'satuan' => $request->satuan
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Satuan  $satuan
    //  * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $satuans = Satuan::findOrFail($id);
        // dd($satuan->kode_kategori);
        return view('satuan.edit', compact('satuans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSatuanRequest  $request
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSatuanRequest $request, $id)
    {
        $satuans = Satuan::findOrFail($id);
        // $satuans->update([
        //     'kategori' => $request->nama
        // ]);
        $satuans->satuan = $request->satuan;
        $satuans->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Satuan  $satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->back();
    }
}