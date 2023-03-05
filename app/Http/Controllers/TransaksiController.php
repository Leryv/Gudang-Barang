<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;

class TransaksiController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    //  * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // $transaksis = Transaksi::all();
        $transaksis = Transaksi::where('status', 'pending')->paginate(5);
        return view('transaksi.masuk', compact('transaksis'));
    }

    public function keluar()
    {
        $transaksis = Transaksi::all();
        $transaksis = Transaksi::where('status', 'approved')->paginate(5);

        return view('transaksi.keluar', compact('transaksis'));
        // return $transaksis;
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create($id)
    {
        $transaksis = Barang::findOrFail($id);
        return view('transaksi.create_request', compact('transaksis'));
        // return $barang;
        // dd($barang->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransaksiRequest  $request
     */
    public function store(StoreTransaksiRequest $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $transaksi = Transaksi::create([
            'barang_id' => $barang->id,
            'jumlah_permintaan' => $request->jumlah_permintaan,
        ]);
        // return $barang;
        return redirect()->route('view.stock-barang')->with('success', 'Berhasil Dibuat');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
    * @param  \App\Models\Transaksi  $transaksi
    //  * @return \Illuminate\Http\Response
    */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        // Transaksi::where('id', $id)->update(['status' => 'approve']);
        // $transaksis = Transaksi::findOrFail($id);
        // $transaksi->status = 'approved';
        // $transaksi->update();

        $barang = Barang::findOrFail($transaksi->barang_id);

        $transaksi->update([
            'status' => 'approved',
            'tanggal_persetujuan' => now(),
        ]);
        if ($transaksi->save()) {
            $hitung = $barang->stock - $transaksi->jumlah_permintaan;

            $barang->update([
                'stock' => $hitung
            ]);
        }
        // $stocks->update([
        //     'stock' => $stocks - $transaksi->jumlah_permintaan
        // ]);

        return redirect()->back()->with('successfull', 'Permintaan Berhasil Disetujui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        // Transaksi::destroy($transaksi->id);
        return redirect()->back()->with('delete', 'Has Been Deleted');
    }
}