@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Negara</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('countries.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="country_name" class="form-label">Nama Negara</label>
            <input type="text" name="country_name" class="form-control" value="{{ old('country_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="1" selected>Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('countries.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection