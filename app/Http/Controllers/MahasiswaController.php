<?php

namespace App\Http\Controllers;

use App\Prodi;
use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         //
        // $mahasiswa = Mahasiswa::latest()->paginate(5); //paginate mengatur banyak data yg tampil dlm 1 hal
        $prd = Prodi::join('mahasiswas', 'mahasiswas.id_prodi', '=', 'prodis.id')
            ->select('mahasiswas.*','prodis.nama_prodi')
            ->get();
        return view('mahasiswa.index',compact('prd')); //nilai dlm compact adl variabel utk passing
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
                $prodi = Prodi::get();
        return view('mahasiswa.create',compact('prodi'));
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
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'id_prodi' => 'required',
        ]);

        Mahasiswa::create($request->all()); //Menyimpan data ke dalam database
        $request->session()->flash('pesan','Mahasiswa bernama '.$request['nama'].' berhasil disimpan.'); //Membuat session sementara berisi pesan
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
               return view('mahasiswa.show',compact('mahasiswa'));

    }

    /** 
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
                $prodi = Prodi::get();
        return view('mahasiswa.edit',compact('mahasiswa','prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
                request()->validate([
            'nim' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'id_prodi' => 'required',
        ]);

        $mahasiswa->update($request->all());
        $request->session()->flash('pesan','Mahasiswa bernama '.$request['nama'].' berhasil diperbarui.');
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Mahasiswa $mahasiswa)
    {
        //
                $mahasiswa->delete();
        $request->session()->flash('pesan','Mahasiswa bernama '.$request['nama'].' berhasil dihapus.');
        return redirect()->route('mahasiswa.index');
    }
}
