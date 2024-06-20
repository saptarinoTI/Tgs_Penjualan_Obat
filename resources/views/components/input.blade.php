@props([
'type' => 'text',
'label',
'name',
'required' => true,
'value' => '',
])

@if ($type == 'text' || $type == 'email' || $type == 'password' || $type == 'number')
<div class="mb-2">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $name }}" {{ $required ? 'required' : '' }} name="{{ $name }}"
        placeholder="Masukkan {{ $label }}" value="{{ $value != '' ? $value : '' }}" {{ $attributes }} />
</div>
@endif

@if ($type == 'textarea')
<div class="mb-2">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <textarea class="form-control" id="{{ $name }}" name="{{ $name }}" rows="3" {{ $attributes
        }}>{{ $value ? $value : '' }}</textarea>
</div>
@endif
