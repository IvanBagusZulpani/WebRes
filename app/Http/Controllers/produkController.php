<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class produkController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 3;
        if(strlen($katakunci)) {
            $data = produk::where('kode','like', "%$katakunci%")
            ->orWhere('nama','like', "%$katakunci%")
            ->orWhere('kategori','like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $data = produk::orderBy('kode', 'desc')->paginate($jumlahbaris);
        }
        return view('produk.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *  
     */
    public function store(Request $request)
    {
        Session::flash('kode', $request->kode);
        Session::flash('nama', $request->nama);
        Session::flash('kategori', $request->kategori);

        $request->validate ([
            'kode'=>'required|integer|unique:produk,kode',
            'nama'=>'required',
            'kategori'=>'required',
        ],[
            'kode.required'=>'kode wajib diisi',
            'kode.integer'=>'kode wajib dalam angka',
            'kode.unique'=>'kode yang diisikan sudah ada dalam database',
            'nama.required'=>'nama wajib diisi',
            'kategori.required'=>'kategori wajib diisi',
        ]);
        $data = [
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'kategori'=>$request->kategori,
        ];
        produk::create($data);
        return redirect()->to('produk')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = produk::where('kode', $id)->first();
        return view('produk.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate ([
            'nama'=>'required',
            'kategori'=>'required',
        ],[
            'nama.required'=>'nama wajib diisi',
            'kategori.required'=>'kategori wajib diisi',
        ]);
        $data = [
            'nama'=>$request->nama,
            'kategori'=>$request->kategori,
        ];
        produk::where('kode', $id)->update($data);
        return redirect()->to('produk')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        produk::where('kode', $id)->delete();
        return redirect()->to('produk')->with('success', 'Berhasil melakukan delete data');
    }
}
