@extends('layouts.app')

@section('titleContent', 'Data Obat')
@section('subTitleContent', 'Detail Data Obat')
@section('descriptionContent', 'Manage Detail Data Obat')

@section('mainContent')
<x-card :created="false">
    <div class="table-responsive">
        <table class="table table-bordered" style="width:100%">
            <tr>
                <td class="fw-bold text-muted col-4">Nama Obat</td>
                <td>{{ ucwords($obat->nama_obat) }}</td>
            </tr>
            <tr>
                <td class="fw-bold text-muted col-4">Jenis Obat</td>
                <td>{{ ucwords($obat->jenis_obat) }}</td>
            </tr>
            <tr>
                <td class="fw-bold text-muted col-4">Stok Obat</td>
                <td>{{ $obat->stok }}</td>
            </tr>
            <tr>
                <td class="fw-bold text-muted col-4">Deskripsi Obat</td>
                <td>{{ ucwords($obat->deskripsi_obat) }}</td>
            </tr>
            <tr>
                <td class="fw-bold text-muted col-4">Dosis Obat</td>
                <td>{{ ucwords($obat->dosis_obat) }}</td>
            </tr>
            <tr>
                <td class="fw-bold text-muted col-4">Harga Obat</td>
                <td>Rp {{ number_format($obat->harga, 0, 0) }}</td>
            </tr>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('obat.index') }}" class="px-4 btn btn-sm btn-dark">Kembali</a>
    </div>
</x-card>
@endsection

@section('scriptContent')
@endsection
