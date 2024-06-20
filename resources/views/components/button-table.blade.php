@props([
'delete' => false,
'icon',
'link',
'color',
])

@if ($delete)
<form action="{{ $link }}" method="post" class="">
    @csrf
    @method('delete')
    <button type="submit" class="p-2 btn btn-sm btn-outline-danger btn-delete">
        <i class='bx bxs-trash bx-xs'></i>
    </button>
</form>
@else
<a href="{{ $link }}" class="btn btn-sm btn-{{ $color }} p-2 ">
    <i class='bx bxs-{{ $icon }} bx-xs'></i>
</a>
@endif
