@props([
'created' => true,
'link' => '',
])

<div class="mb-4 card">
    <div class="card-body">
        @if ($created && auth()->user()->is_admin == 1)
        <div class="d-flex justify-content-center justify-content-md-end">
            <a href="{{ $link }}" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        @endif
        {{ $slot }}
    </div>
</div>
