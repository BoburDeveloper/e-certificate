<x-layout title="Certificates">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">🏆 Certificates</h1>
        <a href="{{ route('certificate.create') }}"
           class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-2.5 rounded-xl shadow hover:from-blue-600 hover:to-indigo-700 transition-all">
            + Add New
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 border border-green-300 p-3 rounded-lg mb-5 shadow-sm">
            ✅ {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-lg shadow">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-50 border-b border-gray-200">
            <tr class="text-left text-gray-700 uppercase text-sm tracking-wider">
                <th class="py-3 px-4">Name</th>
                <th class="py-3 px-4">Role</th>
                <th class="py-3 px-4">Category</th>
                <th class="py-3 px-4">Reg. date</th>
                <th class="py-3 px-4">Photo</th>
                <th class="py-3 px-4 text-center">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @forelse ($certificates as $certificate)
                <tr class="hover:bg-gray-50 transition-all">
                    <td class="py-3 px-4 font-medium text-gray-800">
                        <a href="{{ route('certificate.show', $certificate->id) }}"
                           class="text-blue-600 hover:underline">
                            {{ $certificate->name }}
                        </a>
                    </td>

                    <td class="py-3 px-4">
                            <span class="px-3 py-1 rounded-full text-sm
                                {{ $certificate->role->name == 'Talaba' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                {{ $certificate->role->name }}
                            </span>
                    </td>

                    <td class="py-3 px-4">
                        <span class="text-gray-700">{{ $certificate->category->name }}</span>
                    </td>


                    <td class="py-3 px-4">
                        <span class="text-gray-700">{{ $certificate->reg_date }}</span>
                    </td>

                    <td class="py-3 px-4">
                        <img src="{{ url('storage/' . $certificate->photo) }}" alt="No image"
                             class="w-16 h-16 object-cover rounded-lg border border-gray-200 shadow-sm" />
                    </td>

                    <td class="py-3 px-4 text-center space-x-2">
                        <a href="{{ route('certificate.view', $certificate->link) }}"
                           class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg shadow text-sm transition">
                            Public link
                        </a>

                        <a href="{{ route('certificate.edit', $certificate) }}"
                           class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1.5 rounded-lg shadow text-sm transition">
                            Edit
                        </a>
                        @if(auth()->user()->role=='admin')
                        <form action="{{ route('certificate.destroy', $certificate) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button
                                onclick="return confirm('Are you sure you want to delete this certificate?')"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-lg shadow text-sm transition">
                                Delete
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500 py-6">
                        No certificates found 😕
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
