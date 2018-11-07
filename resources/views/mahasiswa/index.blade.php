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
            <h2>Daftar Mahasiswa</h2>
          </div>

          <div class="float-right">
            <a class="btn btn-primary" href="{{ route('mahasiswa.create') }}">Tambah Mahasiswa</a>
          </div>

          <table class="table table-striped">

            <thead>
              <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Program Studi</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @php($no = 1)
              @foreach ($prd as $mhs)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $mhs->nim }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->alamat }}</td>
                <td>{{ $mhs->nama_prodi }}</td>
                <td>

                  <form action="{{ route('mahasiswa.destroy',$mhs->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-warning" href="{{ route('mahasiswa.edit',$mhs->id) }}">Edit</a>
                    <input type="hidden" name="judul" value="{{ $mhs->nama }}">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>

          </table>
          <a href="{{ url('welcome') }}">Back</a>

        </div>
      </div>
    </div>
  </div>
  @endsection