<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\Barang;
use App\Models\Brand;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class BarangController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    //  * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $kategoris = Kategori::paginate(5);
        return view('barang.index', compact('kategoris'));
    }

    /**
    * Show the form for creating a new resource.
    *
    //  * @return \Illuminate\Http\Response
    */
    public function create($id)
    {
        $data = [
            'kategoris' => Kategori::findOrFail($id),
            'brands' => Brand::all(),
            'satuans' => Satuan::all(),
        ];
        // return view('masterbarang.create', $data);
        // return view('masterbarang.create', $data);
        // $barangs = Barang::all();
        // dd($data);
        return view('barang.create_stock_barang', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBarangRequest  $request
     */
    public function store(StoreBarangRequest $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $barang = Barang::create([
            'kategori_id' => $kategori->id,
            'nama_barang' => $request->nama_barang,
            'brand_id' => $request->brand_id,
            'satuan_id' => $request->satuan_id,
            'harga' => $request->harga,
            'stock' => $request->stock,
        ]);
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBarangRequest  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     */

    public function all()
    {
        $barangs = Barang::paginate(5);
        return view('barang.restockbarang', compact('barangs'));
    }
}