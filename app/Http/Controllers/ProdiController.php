<?php

namespace App\Http\Controllers;

use App\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $prodi = Prodi::latest()->paginate(5); //paginate mengatur banyak data yg tampil dlm 1 hal
        return view('prodi.index',compact('prodi')); //nilai dlm compact adl variabel utk passing
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('prodi.create');
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
                request()->validate([ //validasi, required artinya harus diisi
            'nama_prodi' => 'required',
            'fakultas' => 'required',
        ]);

        Prodi::create($request->all()); //Menyimpan data ke dalam database
        $request->session()->flash('pesan','Program Studi '.$request['nama_prodi'].' berhasil disimpan.'); //Membuat session sementara berisi pesan
        return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
         return view('prodi.show',compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodi $prodi)
    {
        //
        return view('prodi.edit',compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodi $prodi)
    {
        //
        request()->validate([
            'nama_prodi' => 'required',
            'fakultas' => 'required',
        ]);

        $prodi->update($request->all());
        $request->session()->flash('pesan','Program Studi '.$request['nama_prodi'].' berhasil diperbarui.');
        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Prodi $prodi)
    {
        //
                $prodi->delete();
        $request->session()->flash('pesan','Program Studi '.$request['nama_prodi'].' berhasil dihapus.');
        return redirect()->route('prodi.index');
    }

    
}
