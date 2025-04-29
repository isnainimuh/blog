@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Negara</h1>

    <div class="mb-3">
        <strong>Nama Negara:</strong> {{ $country->country_name }}
    </div>

    <div class="mb-3">
        <strong>Status:</strong> {{ $country->status ? 'Aktif' : 'Tidak Aktif' }}
    </div>

    <a href="{{ route('countries.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection