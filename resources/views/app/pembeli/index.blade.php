@extends('layouts.app')

@section('titleContent', 'Data Pembeli')
@section('subTitleContent', '')
@section('descriptionContent', 'Manage Data Pembeli')

@section('mainContent')
<x-card :created="false">
    <x-table>
        <x-slot:thead>
            <tr>
                <th>Nama</th>
                <th>Nomor Hp</th>
                <th>Alamat</th>
                <th></th>
            </tr>
        </x-slot:thead>

        @foreach ($pembelis as $pembeli)
        <tr>
            <td>{{ ucwords($pembeli->name) }}</td>
            <td>{{ ucwords($pembeli->no_hp) }}</td>
            <td>{{ ucwords($pembeli->alamat) }}</td>
            <td class="w-full h-full gap-1 d-flex justify-content-end">
                <x-button-table :delete="true" link="{{ route('pembeli.destroy', $pembeli->id) }}" />
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
@endsection
