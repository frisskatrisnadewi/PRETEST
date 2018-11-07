@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">

      @if ($pesan = Session::get('pesan'))
      <div class="alert alert-success">
        <p>{{ $pesan }}</p>
      </div>
      @endif

      <div class="card">
        <div class="card-body">
          <div class="float-left">
            <h2>Daftar Program Studi</h2>
          </div>
           <a href="{{ url('welcome') }}">Back</a>
          <div class="float-right">
            <a class="btn btn-primary" href="{{ route('prodi.create') }}">Tambah Program Studi</a>
          </div>

          <table class="table table-striped">

            <thead>
              <tr>
                <th>No</th>
                <th>Program Studi</th>
                <th>Fakultas</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @php($no = 1)
              @foreach ($prodi as $prd)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $prd->nama_prodi }}</td>
                <td>{{ $prd->fakultas }}</td>
                <td>

                  <form action="{{ route('prodi.destroy',$prd->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-warning" href="{{ route('prodi.edit',$prd->id) }}">Edit</a>
                    <input type="hidden" name="judul" value="{{ $prd->nama_prodi }}">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>

          </table>


        </div>
      </div>
    </div>
  </div>
  @endsection