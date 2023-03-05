<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    //  * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $brands = Brand::paginate(5);
        // $brands = Brand::all();
        // You need to remove all():
        // Dispatch::where('user_id', Auth::id())->paginate(10);
        return view('brand.index', compact('brands'));
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
    * @param  \App\Http\Requests\StoreBrandRequest  $request
    //  * @return \Illuminate\Http\Response
    */
    public function store(StoreBrandRequest $request)
    {
        $brands = Brand::create([
            'brand' => $request->brand
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Brand  $brand
    //  * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $brands = Brand::findOrFail($id);
        // dd($brands->kode_kategori);
        return view('brand.edit', compact('brands'));


    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateBrandRequest  $request
    * @param  \App\Models\Brand  $brand
    //  * @return \Illuminate\Http\Response
    */
    public function update(UpdateBrandRequest $request, $id)
    {
        $brands = Brand::findOrFail($id);
        // $brands->update([
        //     'kategori' => $request->nama
        // ]);
        $brands->brand = $request->brand;
        $brands->save();
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->back();
    }
}