@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <h2>Edit Program Studi</h2>
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="{{ route('prodi.update',$prodi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row">
              <div class="col-md-12">
                <strong>Program Studi</strong>
                <input type="text" name="nama_prodi" class="form-control" placeholder="Nama Program Studi" value="{{$prodi->nama_prodi }}">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <strong>Fakultas</strong>
                <input type="text" name="fakultas" class="form-control" placeholder="Nama Fakultas" value="{{$prodi->fakultas }}">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6">
                <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
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