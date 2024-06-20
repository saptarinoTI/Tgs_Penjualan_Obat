@extends('layouts.app')

@section('titleContent', 'Data Obat')
@section('subTitleContent', 'Ubah Data Obat')
@section('descriptionContent', 'Manage Ubah Data Obat')

@section('mainContent')
<x-card :created="false">
    <form action="{{ route('obat.update', $obat->id) }}" method="post">
        @csrf
        @method('put')
        <x-input label="Nama Obat" name="nama_obat" value="{{ $obat->nama_obat }}" />
        <x-input label="Jenis Obat" name="jenis_obat" value="{{ $obat->jenis_obat }}" />
        <x-input type="number" label="Stok Obat" name="stok" min="1" value="{{ $obat->stok }}" />
        <x-input type="textarea" label="Deskripsi Obat" name="deskripsi_obat" value="{{ $obat->deskripsi_obat }}" />
        <x-input type="textarea" label="Dosis Obat" name="dosis_obat" value="{{ $obat->dosis_obat }}" />
        <x-input type="number" label="Harga Obat" name="harga" min="1" value="{{ $obat->harga }}" />

        <x-button label="Simpan Data" />
    </form>

</x-card>
@endsection

@section('scriptContent')
@endsection
