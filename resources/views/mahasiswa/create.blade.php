@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <h2>Mahasiswa Baru</h2>
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          
          <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf
            <div class="form-group row">
              <div class="col-md-12">
                <strong>NIM</strong>
                <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <strong>Nama</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <strong>Alamat</strong>
                <textarea class="form-control" rows="5" name="alamat" placeholder="Alamat Lengkap"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <strong>Program Studi</strong>

                <select name="id_prodi" class="form-control" id="sel1">
                  @foreach ($prodi as $prd)
                    <option value="{{$prd->id}}">{{$prd->nama_prodi}}</option>
                  @endforeach
                  </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-6">
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
              </div>
              <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection