@extends('layouts.app')

@section('titleContent', 'Data Obat')
@section('subTitleContent', '')
@section('descriptionContent', 'Manage Data Obat')

@section('mainContent')
<x-card link="{{ route('obat.create') }}">
    <x-table>
        <x-slot:thead>
            <tr>
                <th>Nama Obat</th>
                <th>Jenis Obat</th>
                <th>Stok Obat</th>
                <th>Harga Obat</th>
                <th></th>
            </tr>
        </x-slot:thead>

        @foreach ($obats as $obat)
        <tr>
            <td>{{ ucwords($obat->nama_obat) }}</td>
            <td>{{ ucwords($obat->jenis_obat) }}</td>
            <td>{{ ucwords($obat->stok) }}</td>
            <td>Rp {{ number_format($obat->harga, 0, 0) }}</td>
            <td class="w-full h-full gap-1 d-flex justify-content-end">
                @if (auth()->user()->is_admin == 0)
                <button type="button" class="btn btn-sm btn-primary btn-keranjang" data-bs-toggle="modal"
                    data-bs-target="#exampleModal" data-id="{{ $obat->id }}">
                    Tambahkan <i class='bx bxs-cart-add'></i>
                </button>
                @endif

                <x-button-table color="outline-primary" icon="info-circle" link="{{ route('obat.show', $obat->id) }}" />
                @if (auth()->user()->is_admin == 1)
                <x-button-table color="outline-warning" icon="pen" link="{{ route('obat.edit', $obat->id) }}" />
                <x-button-table :delete="true" link="{{ route('obat.destroy', $obat->id) }}" />
                @endif
            </td>
        </tr>
        @endforeach
    </x-table>
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
            <form action="{{ route('obat.pembelian') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Ke Keranjang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="idPembelian">
                    <label for="name" class="form-label">Jumlah Pembelian Obat</label>
                    <input class="form-control @error('jumlah') is-invalid @enderror" required type="number"
                        name="jumlah" id="jumlah" min="1" placeholder="Masukkan jumlah pembelian obat"
                        value="{{ old('jumlah') }}" />
                    @error('jumlah')
                    <div class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-sm btn-primary">Masukkan Keranjang</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const btnKeranjangs = document.querySelectorAll('.btn-keranjang');
    const idPembelian = document.querySelector('#idPembelian');

    btnKeranjangs.forEach(el => {
     $(el).on('click', function () {
        $(idPembelian).val($(el).data('id'));
     });
    });
</script>
@endsection
