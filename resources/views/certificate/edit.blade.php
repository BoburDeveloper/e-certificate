<x-layout title="Edit Book">
    <h1 class="text-2xl font-bold mb-4">Edit Certificate</h1>
    @php
    $form_type = 'update';
    @endphp
    @include('certificate.form')
</x-layout>
