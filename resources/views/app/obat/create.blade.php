@extends('layouts.app')

@section('titleContent', 'Data Obat')
@section('subTitleContent', 'Tambah Data Obat')
@section('descriptionContent', 'Manage Tambah Data Obat')

@section('mainContent')
<x-card :created="false">
    <form action="{{ route('obat.store') }}" method="post">
        @csrf
        <x-input label="Nama Obat" name="nama_obat" />
        <x-input label="Jenis Obat" name="jenis_obat" />
        <x-input type="number" label="Stok Obat" name="stok" min="1" />
        <x-input type="textarea" label="Deskripsi Obat" name="deskripsi_obat" />
        <x-input type="textarea" label="Dosis Obat" name="dosis_obat" />
        <x-input type="number" label="Harga Obat" name="harga" min="1" />

        <x-button label="Simpan Data" />
    </form>

</x-card>
@endsection

@section('scriptContent')
@endsection
