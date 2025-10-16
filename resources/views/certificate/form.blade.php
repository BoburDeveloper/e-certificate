@if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST"  
                    action="{{ $form_type == 'update'
                    ? route('certificate.update', $certificate->id)
                    : route('certificate.store') }}"
                     class="space-y-4" enctype="multipart/form-data">
        
         @if ($form_type == 'update')
            @method('PUT')
        @endif
        @csrf
        <div>
            <label>Name</label>
            <input name="name" class="border p-2 w-full" required value="{{ $certificate->name ?? null }}">
        </div>
        <div>
            <label>ID number</label>
            <input name="id" class="border p-2 w-full" required value="{{ $certificate->id ?? null }}">
        </div>

        <div>
            <label>role</label>
            <select name="role" class="border p-2 w-full" required>
                <option value="1">Talaba</option>
                <option value="2">O'qituvchi</option>
            </select>
        </div>

        <div>
            <label>Category</label>
            <select name="category" class="border p-2 w-full" required>
                <option value="1">Student of the month</option>
            </select>
        </div>
        @if($form_type=='update')
        <div>
            <label>Status</label>
            <select name="status" class="border p-2 w-full" required>
                <option value="1" {{ $certificate->status==1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $certificate->status==0 ? 'selected' : '' }}>Not active</option>
            </select>
        </div>
        @endif
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
            @if(isset($certificate->photo))
                <img src="{{asset( 'storage/'.$certificate->photo )}}"  class="w-32 h-32 object-cover rounded" />
            @endif
            <input name="photo" class="border p-2 w-full block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('certificate.index') }}" class="text-gray-500 ml-2">Cancel</a>
    </form>