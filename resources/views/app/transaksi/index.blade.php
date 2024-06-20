@extends('layouts.app')

@section('titleContent', 'Pembelian Obat')
@section('subTitleContent', '')
@section('descriptionContent', 'Manage Pembelian Obat')

@section('mainContent')
<x-card :created="false">
    <x-table>
        <x-slot:thead>
            <tr>
                <th>Tgl. Pembelian</th>
                <th>Nama</th>
                <th>Kode Unik</th>
                <th>Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
                <th></th>
            </tr>
        </x-slot:thead>

        @foreach ($transaksis as $transaksi)
        <tr>
            <td>{{ ($transaksi->tgl_pembelian) }}</td>
            <td>{{ ucwords($transaksi->user->name) }}</td>
            <td>{{ $transaksi->kode_unik }}</td>
            <td>{{ strtoupper($transaksi->pembayaran) }}</td>
            <td>
                @if ($transaksi->bukti_tf)
                <a href="{{ asset('storage/pembayaran/' . $transaksi->bukti_tf) }}" target="_blank"
                    rel="noopener noreferrer">
                    <img src="{{ asset('storage/pembayaran/' . $transaksi->bukti_tf) }}" alt="" width="30" />
                </a>
                @else
                -
                @endif
            </td>
            <td>
                @if ($transaksi->status == 0)
                <span class="px-2 py-1 text-sm text-white rounded bg-info">Pesanan Dibuat</span>
                @elseif ($transaksi->status == 1)
                <span class="px-2 py-1 text-sm text-white rounded bg-dark">Pesanan Obat Diantarkan</span>
                @elseif ($transaksi->status == 2)
                <span class="px-2 py-1 text-sm text-white rounded bg-primary">Pesanan Selesai</span>
                @elseif ($transaksi->status == 3)
                <span class="px-2 py-1 text-sm text-white rounded bg-danger">Pesanan Gagal</span>
                @endif
            </td>
            <td class="w-full h-full gap-1 d-flex justify-content-end">
                <x-button-table color="outline-primary" icon="info-circle"
                    link="{{ route('transaksi.show', $transaksi->id) }}" />
        </tr>
        @endforeach
    </x-table>
</x-card>
@endsection

@section('scriptContent')
<script>
    new DataTable('#example');
</script>
@endsection
