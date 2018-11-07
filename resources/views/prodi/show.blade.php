@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <p>{{ $prodi->nim }}</p>
          <p>{{ $prodi->nama }}</p>
          <p>{{ $prodi->alamat }}</p>
          <div class="form-group row">
            <div class="col-md-6">
              <a href="{{ route('mahasiswa.index') }}" class="btn">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection