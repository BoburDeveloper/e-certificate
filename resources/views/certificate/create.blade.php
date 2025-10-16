<x-layout title="Add Certificate">
    <h1 class="text-2xl font-bold mb-4">Add New certificate</h1>
    @php
    $form_type = 'store';
    @endphp
    @include('certificate.form')
</x-layout>
