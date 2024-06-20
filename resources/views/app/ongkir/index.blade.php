@extends('layouts.app')

@section('titleContent', 'Data Obat')
@section('subTitleContent', '')
@section('descriptionContent', 'Manage Data Obat')

@section('mainContent')
<x-card :created="false">
    <form action="{{ route('ongkir.update', $ongkir->id) }}" method="post">
        @csrf
        @method('put')
        <label for="ongkir" class="form-label">Ongkos Kirim</label>
        <input type="number" min="1" class="form-control @error('ongkir') is-invalid @enderror" name="ongkir"
            id="ongkir" required value="{{ $ongkir->biaya }}" />
        <button type="submit" class="mt-2 btn btn-sm btn-primary">Simpan Data</button>
    </form>
</x-card>
@endsection

@section('scriptContent')
@endsection
