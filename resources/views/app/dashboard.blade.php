@extends('layouts.app')

@section('titleContent', 'Dashboard')
@section('subTitleContent', '')
@section('descriptionContent', '')

@section('mainContent')
@if (auth()->user()->is_admin == 1)
<div class="row">
    <div class="col-12 col-lg-4">
        <x-card :created="false">
            <p class="fw-bold text-dark">Data Pembeli</p>
            <div class="gap-2 d-flex align-items-end">
                <h2 class="text-primary fw-bold">{{ count($pembeli) }}</h2>
                <span class="text-muted small">Total Pembeli</span>
            </div>
        </x-card>
    </div>
    <div class="col-12 col-lg-4">
        <x-card :created="false">
            <p class="fw-bold text-dark">Data Obat</p>
            <div class="gap-2 d-flex align-items-end">
                <h2 class="text-info fw-bold">{{ count($obat) }}</h2>
                <span class="text-muted small">Total Obat</span>
            </div>
        </x-card>
    </div>
    <div class="col-12 col-lg-4">
        <x-card :created="false">
            <p class="fw-bold text-dark">Pembelian Obat</p>
            <div class="gap-2 d-flex align-items-end">
                <h2 class="text-danger fw-bold">{{ count($transaksi) }}</h2>
                <span class="text-muted small">Total Transaksi</span>
            </div>
        </x-card>
    </div>
</div>
@else
<div class="row">
    <div class="col-12 col-lg-6">
        <x-card :created="false">
            <p class="fw-bold text-dark">Data Obat</p>
            <div class="gap-2 d-flex align-items-end">
                <h2 class="text-info fw-bold">{{ count($obat) }}</h2>
                <span class="text-muted small">Total Obat</span>
            </div>
        </x-card>
    </div>
    <div class="col-12 col-lg-6">
        <x-card :created="false">
            <p class="fw-bold text-dark">Pembelian Obat</p>
            <div class="gap-2 d-flex align-items-end">
                <h2 class="text-danger fw-bold">{{ count($transaksi) }}</h2>
                <span class="text-muted small">Total Transaksi</span>
            </div>
        </x-card>
    </div>
</div>
@endif
@endsection

@section('scriptContent')
@endsection
