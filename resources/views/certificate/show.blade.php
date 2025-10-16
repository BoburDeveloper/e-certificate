<x-layout title="Certificate Details">
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-2xl p-6 mt-6">

        <h1 class="text-2xl font-bold mb-4 text-gray-800">Certificate Information</h1>

        {{-- Photo --}}
        @if ($certificate->photo)
            <div class="mb-4 text-center">
                <img src="{{ asset('storage/' . $certificate->photo) }}"
                     alt="{{ $certificate->title }}"
                     class="w-48 h-48 object-cover rounded mx-auto shadow">
            </div>
        @else
            <div class="mb-4 text-center text-gray-500">
                <em>No photo uploaded</em>
            </div>
        @endif

        {{-- Title --}}
        <div class="mb-3">
            <p class="text-sm text-gray-500">Name</p>
            <p class="text-lg font-semibold text-gray-800">{{ $certificate->name }}</p>
        </div>

        {{-- Author --}}
        <div class="mb-3">
            <p class="text-sm text-gray-500">Role</p>
            <p class="text-lg font-semibold text-gray-800">{{ $certificate->role }}</p>
        </div>

        {{-- Category (agar mavjud bo‘lsa) --}}
        @if (!empty($certificate->category))
            <div class="mb-3">
                <p class="text-sm text-gray-500">Category</p>
                <p class="text-lg text-gray-800">{{ $certificate->category }}</p>
            </div>
        @endif

        <div class="mb-3">
                <p class="text-sm text-gray-500">Created at</p>
                <p class="text-lg text-gray-800">{{ $certificate->created_at }}</p>
            </div>

        {{-- Status (agar mavjud bo‘lsa) --}}
        @if (isset($certificate->status))
            <div class="mb-3">
                <p class="text-sm text-gray-500">Status</p>
                <span class="px-3 py-1 rounded text-sm font-medium 
                    {{ $certificate->status ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600' }}">
                    {{ $certificate->status ? 'Active' : 'Inactive' }}
                </span>
            </div>
        @endif

        {{-- Public link --}}
        <div class="mt-6">
            <p class="text-sm text-gray-500">Public Link</p>
            <a href="{{ route('certificate.view', $certificate->link) }}"
               class="text-blue-600 hover:underline break-all">
                {{ route('certificate.view', $certificate->link) }}
            </a>
        </div>

    </div>
</x-layout>
