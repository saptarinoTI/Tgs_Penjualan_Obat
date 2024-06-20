@extends('layouts.app')

@section('titleContent', 'Pembelian Obat')
@section('subTitleContent', 'Detail Pembelian Obat')
@section('descriptionContent', 'Manage Detail Pembelian Obat')

@section('mainContent')
<x-card :created="false">
    <div class="table-responsive">
        <table class="table table-bordered" style="width:100%">
            <tr>
                <td class="fw-bold text-muted col-4">Kode Unik</td>
                <td>{{ $data->kode_unik }}</td>
            </tr>
            <tr>
                <td class="fw-bold text-muted col-4">Tgl. Pembelian</td>
                <td>{{ date('d/m/Y', strtotime($data->tgl_pembelian)) }}</td>
            </tr>
            <tr>
                <td class="fw-bold text-muted col-4">Nama Pembeli</td>
                <td>{{ ucwords($data->user->name) }}</td>
            </tr>
            <tr>
                <td class="fw-bold text-muted col-4">Alamat/td>
                <td>{{ ucwords($data->user->alamat) }}</td>
            </tr>
            <tr>
                <td class="fw-bold text-muted col-4">Pembayaran</td>
                <td>{{ ucwords($data->pembayaran) }}</td>
            </tr>
            @if ($data->pembayaran == 'transfer')
            <tr>
                <td class="fw-bold text-muted col-4">Bukti Transfer</td>
                <td>
                    <a href="{{ asset('storage/pembayaran/' . $data->bukti_tf) }}" target="_blank"
                        rel="noopener noreferrer">
                        <img src="{{ asset('storage/pembayaran/' . $data->bukti_tf) }}" alt="" width="100" />
                    </a>
                </td>
            </tr>
            @endif
            <tr>
                <td class="fw-bold text-muted col-4">Status</td>
                <td>
                    @if ($data->status == 0)
                    <span class="px-2 py-1 text-sm text-white rounded bg-info">Pesanan Dibuat</span>
                    @elseif ($data->status == 1)
                    <span class="px-2 py-1 text-sm text-white rounded bg-dark">Pesanan Obat Diantarkan</span>
                    @elseif ($data->status == 2)
                    <span class="px-2 py-1 text-sm text-white rounded bg-primary">Pesanan Selesai</span>
                    @elseif ($data->status == 3)
                    <span class="px-2 py-1 text-sm text-white rounded bg-danger">Pesanan Gagal</span>
                    @endif
                </td>
            </tr>
            <tr>
                <td class="fw-bold text-muted col-4">Total</td>
                <td>Rp {{ number_format($data->total, 0, 0) }}</td>
            </tr>
        </table>

        <div class="table-responsive-md">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Obat</th>
                        <th>Jumlah</th>
                        <th>Harga Obat</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data->detailtransaksis as $detail)
                    <tr>
                        <td>{{ ucwords($detail->obat->nama_obat) }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>Rp {{ number_format($detail->obat->harga, 0, 0) }}</td>
                        <td>Rp {{ number_format($detail->jumlah * $detail->obat->harga) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="gap-1 d-flex justify-content-end">
        @if (auth()->user()->is_admin == 1 && $data->status == 1)
        <a href="{{ route('transaksi.finish', $data->id) }}" class="px-4 text-white btn btn-sm btn-success">Finish</a>
        @endif
        @if (auth()->user()->is_admin == 1 && $data->status == 0)
        <a href="{{ route('transaksi.confirm', $data->id) }}"
            class="px-4 text-white btn btn-sm btn-success">Konfirmasi</a>
        <a href="{{ route('transaksi.reject', $data->id) }}" class="px-4 text-white btn btn-sm btn-danger">Batal</a>
        @endif
        <a href="{{ route('transaksi.index') }}" class="px-4 btn btn-sm btn-dark">Kembali</a>
    </div>
</x-card>
@endsection

@section('scriptContent')
@endsection
