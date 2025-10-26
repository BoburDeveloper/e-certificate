<x-layout title="Certificate Details">
    <div class="max-w-3xl mx-auto bg-white shadow-xl rounded-2xl overflow-hidden mt-10 border border-gray-100">
        {{-- Header --}}
        <div class="bg-gradient-to-r from-indigo-600 to-blue-500 px-6 py-4">
            <h1 class="text-2xl font-bold text-white">🎓 Certificate Information</h1>
        </div>

        <div class="p-8 space-y-6">
            {{-- Photo --}}
            @if ($certificate->photo)
                <div class="flex justify-center">
                    <img src="{{ url('storage/' . $certificate->photo) }}"
                         alt="{{ $certificate->title }}"
                         class="w-52 h-52 object-cover rounded-xl shadow-md ring-4 ring-indigo-100">
                </div>
            @else
                <div class="text-center text-gray-400 italic">
                    No photo uploaded
                </div>
            @endif

            {{-- Info section --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Name</p>
                    <p class="text-lg font-semibold text-gray-900">{{ $certificate->name }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Role</p>
                    <p class="text-lg font-medium text-gray-800">{{ $certificate->role->name }}</p>
                </div>

                @if (!empty($certificate->category))
                    <div>
                        <p class="text-sm text-gray-500 uppercase tracking-wide">Category</p>
                        <p class="text-lg font-medium text-gray-800">{{ $certificate->category->name }}</p>
                    </div>
                @endif

                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide">Created At</p>
                    <p class="text-lg font-medium text-gray-800">
                        {{ $certificate->created_at->format('Y-m-d H:i') }}
                    </p>
                </div>
            </div>

            {{-- Description --}}
            <div>
                <p class="text-sm text-gray-500 uppercase tracking-wide">About Role</p>
                <div class="bg-gray-50 border border-gray-100 rounded-xl p-4 text-gray-700 leading-relaxed">
                    {{ $certificate->description }}
                </div>
            </div>

            {{-- Status --}}
            @if (isset($certificate->status))
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wide mb-1">Status</p>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                        {{ $certificate->status ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600' }}">
                        <span class="w-2 h-2 mr-2 rounded-full {{ $certificate->status ? 'bg-green-500' : 'bg-gray-400' }}"></span>
                        {{ $certificate->status ? 'Active' : 'Inactive' }}
                    </span>
                </div>
            @endif

            {{-- Public Link --}}
            <div>
                <p class="text-sm text-gray-500 uppercase tracking-wide mb-1">Public Link</p>
                <a href="{{ route('certificate.view', $certificate->link) }}"
                   class="text-blue-600 hover:text-blue-800 font-medium break-all">
                    {{ route('certificate.view', $certificate->link) }}
                </a>
            </div>

            <div id="qr-code-text" class="qr-code-div mx-auto w-64">
                <?php
                $url = route('certificate.view', $certificate->link);
                $guid_is_ready = isset($certificate->link) ? true : false;
                if($guid_is_ready) {
                    $qrCodeText = $url;
                } else {
                    $qrCodeText = $url;
                }

                ob_start();
                $_GET['s'] = 'qr';
                $_GET['d'] = $qrCodeText;
                $_GET['sf'] = 3;
                $_GET['ms'] = 'r';
                $_GET['md'] = 1;
                $_GET['wq'] = 0;

                include public_path('SystemQRCode.php');
                $generator = new \App\Models\SystemQRCode($url);
                $generator->output_image();
                $data = ob_get_clean();
                $base64 = 'data:image/png;base64,' . base64_encode($data);

                // echo $file3;
                ?>
                <img src="<?=$base64?>" class="qr-code-image" />
            </div>
        </div>
    </div>
</x-layout>
