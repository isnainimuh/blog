@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Negara</h1>
    <a href="{{ route('countries.create') }}" class="btn btn-primary mb-3">Tambah Negara</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Negara</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($countries as $country)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $country->country_name }}</td>
                <td>{{ $country->status ? 'Aktif' : 'Tidak Aktif' }}</td>
                <td>
                    <a href="{{ route('countries.show', $country->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('countries.destroy', $country->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection