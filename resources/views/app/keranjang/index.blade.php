@extends('layouts.app')

@section('titleContent', 'Keranjang Belanja')
@section('subTitleContent', '')
@section('descriptionContent', 'Manage Keranjang Belanja')

@section('mainContent')
<x-card :created="false">
    @if (count($keranjangs) > 0)
    <div class="mb-3 d-flex justify-content-end">
        <button type="button" class="btn btn-sm btn-primary btn-keranjang" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
            Konfirmasi Pemesanan
        </button>
    </div>
    @endif

    <x-table>
        <x-slot:thead>
            <tr>
                <th>Nama Obat</th>
                <th>Jumlah Obat</th>
                <th></th>
            </tr>
        </x-slot:thead>

        @foreach ($keranjangs as $keranjang)
        @php
        $ongkirs += $keranjang->jumlah * $keranjang->obat->harga;
        @endphp
        <tr>
            <td>{{ ucwords($keranjang->obat->nama_obat) }}</td>
            <td>{{ ucwords($keranjang->jumlah) }}</td>
            <td class="w-full h-full gap-1 d-flex justify-content-end">
                <x-button-table :delete="true" link="{{ route('keranjang.destroy', $keranjang->id) }}" />
            </td>
        </tr>
        @endforeach
    </x-table>

    <div class="d-flex justify-content-end">
        <p class="mt-4 small fw-bold">Total Pembayaran + Ongkir Rp {{ number_format($ongkir->biaya, 0, 0) }} = Rp {{
            number_format($ongkirs + $ongkir->biaya, 0, 0) }}</p>
    </div>
</x-card>
@endsection

@section('scriptContent')
<script>
    new DataTable('#example');
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('keranjang.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Ke Keranjang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pembayaran" class="form-label">Jenis Pembayaran</label>
                        <select name="pembayaran" id="pembayaran" class="form-select">
                            <option value="cod">COD</option>
                            <option value="transfer">Transfer</option>
                        </select>
                    </div>
                    <div class="mb-3 d-none" id="pemTF">
                        <label for="pembayaran" class="form-label">Bukti Transfer</label>
                        <input class="form-control @error('transfer') is-invalid @enderror" type="file" name="transfer"
                            id="transfer" value="{{ old('transfer') }}" />
                        @error('transfer')
                        <div class="mt-1 text-sm font-semibold text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Konfirmasi Pembelian</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#pembayaran').change(function(){
        if ($(this).val() != "transfer") {
            $('#pemTF').addClass('d-none');
        } else {
            $('#pemTF').removeClass('d-none');
        }
    });
</script>
@endsection
