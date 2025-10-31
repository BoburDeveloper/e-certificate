<x-layout title="{{ $form_type == 'update' ? 'Edit Certificate' : 'Create Certificate' }}">
    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-2xl overflow-hidden mt-10 border border-gray-100">
        {{-- Header --}}
        <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-6 py-4">
            <h1 class="text-2xl font-bold text-white">
                {{ $form_type == 'update' ? '✏️ Update Certificate' : '🎓 Create New Certificate' }}
            </h1>
        </div>

        <div class="p-8 space-y-6">
            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-400 text-red-700 p-4 rounded-md shadow-sm">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM --}}
            <form method="POST"
                  action="{{ $form_type == 'update'
                        ? route('certificate.update', $certificate->id)
                        : route('certificate.store') }}"
                  enctype="multipart/form-data"
                  class="space-y-6">

                @csrf
                @if ($form_type == 'update')
                    @method('PUT')
                @endif

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Full Name</label>
                    <input type="text" name="name" required
                           value="{{ old('name', $certificate->name ?? '') }}"
                           class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 shadow-sm">
                </div>

                {{-- Role --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Role</label>
                    <select name="role_id" required
                            class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 shadow-sm bg-white">
                        <option value="">-- Select Role --</option>
                        <option value="1" {{ old('role_id', $certificate->role_id ?? '') == 1 ? 'selected' : '' }}>Talaba</option>
                        <option value="2" {{ old('role_id', $certificate->role_id ?? '') == 2 ? 'selected' : '' }}>O'qituvchi</option>
                    </select>
                </div>

                {{-- Category --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
                    <select name="category_id" required
                            class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 shadow-sm bg-white">
                        <option value="1" {{ old('category_id', $certificate->category_id ?? '') == 1 ? 'selected' : '' }}>
                            Student of the Month
                        </option>
                    </select>
                </div>

                <div>
                    <label for="reg_date" class="block text-sm font-medium text-gray-700 mb-1">
                        Registration Date
                    </label>
                    <input
                        type="date"
                        name="reg_date"
                        id="reg_date"
                        value="{{ old('reg_date', $certificate->reg_date ?? '') }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-gray-700
               focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400
               transition duration-200 ease-in-out bg-gray-50"
                        required
                    >
                </div>

                {{-- Description --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Description</label>
                    <textarea name="description" rows="4"
                              class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 shadow-sm"
                              placeholder="Write about the student's achievement...">{{ old('description', $certificate->description ?? '') }}</textarea>
                </div>

                {{-- Status (only update) --}}
                @if ($form_type == 'update')
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
                        <select name="status" required
                                class="w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 p-2.5 shadow-sm bg-white">
                            <option value="1" {{ $certificate->status == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $certificate->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                @endif

                {{-- Photo --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Photo</label>
                    @if(isset($certificate->photo))
                        <img src="{{ url('storage/'.$certificate->photo) }}"
                             class="w-28 h-28 object-cover rounded-lg border border-gray-200 mb-3 shadow-sm">
                    @endif
                    <input name="photo" type="file"
                           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 transition-all">
                    <p class="text-xs text-gray-500 mt-1">Accepted formats: JPG, PNG. Max 2MB.</p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Certificate</label>
                    @if(isset($certificate->file))
                        <a href="{{ url('storage/'.$certificate->file) }}">File</a>
                    @endif
                    <input name="file" type="file"
                           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-3 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 transition-all">
                    <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, JPG, PNG. Max 2MB.</p>
                </div>

                {{-- Buttons --}}
                <div class="pt-4 flex items-center justify-end space-x-3">
                    <a href="{{ route('certificate.index') }}"
                       class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                        Cancel
                    </a>
                    <button type="submit"
                            class="px-6 py-2 rounded-lg bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition shadow">
                        {{ $form_type == 'update' ? 'Update' : 'Save' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
