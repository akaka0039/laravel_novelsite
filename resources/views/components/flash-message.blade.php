@props(['status' => 'info'])

@php
if (session('status') === 'info') {
    $bgColor = 'bg-blue-300';
}
if (session('status') === 'alert') {
    $bgColor = 'bg-red-500';
}
@endphp

@if (session('message'))
    <div class="{{ $bgColor }} text-center w-1/2 mx-auto p-2 my-4 text-black">
        {{ session('message') }}
    </div>
@endif
