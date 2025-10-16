<x-layout title="Certificates">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Certificates</h1>
        <a href="{{ route('certificate.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full bg-white shadow rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 text-left">Name</th>
                <th class="py-2 px-4 text-left">Role</th>
                <th class="py-2 px-4 text-left">Category</th>
                <th class="py-2 px-4 text-left">Photo</th>
                <th class="py-2 px-4 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($certificates as $certificate)
            <tr class="border-t">
                <td class="py-2 px-4">
                    <a href="{{ route('certificate.show', $certificate->id) }}"
                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                    {{ $certificate->name }}
                    </a>
                </td>
                <td class="py-2 px-4">{{ $certificate->role }}</td>
                <td class="py-2 px-4">{{ $certificate->category }}</td>
                <td class="py-2 px-4"><img src="{{asset( 'storage/'.$certificate->photo )}}"  class="w-32 h-32 object-cover rounded" /></td>
                <td class="py-2 px-4">
                    <a href="{{ route('certificate.edit', $certificate) }}" class="text-blue-500">Edit</a>
                   | <form action="{{ route('certificate.destroy', $certificate) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button class="text-red-500" onclick="return confirm('Delete this certificate?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
