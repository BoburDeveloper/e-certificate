<x-layout title="Certificate of Achievement">
    <!--<button type="button" onclick="printDiv('document-card')"-->
    <!--        class="absolute top-4 right-4 bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">-->
    <!--    PRINT-->
    <!--</button>-->

    <div class="flex justify-center items-center min-h-screen bg-gray-100 py-10">
        <div class="document-card relative w-[1100px] h-[750px] shadow-2xl overflow-hidden border-8 border-gray-100 rounded-2xl bg-white">

            <!-- ✅ Background image -->
            <img src="{{ asset('img/bg.png') }}"
                 style="position: absolute; inset: 0; width: 100%; height: 100%;
                        object-fit: cover; z-index: 0; border-radius: 0; margin: 0;">

            <!-- ✅ Overlay to fix edge bleed -->
            <div style="position:absolute; inset:0; background:white; opacity:0.03; z-index:1;"></div>

            <!-- ✅ Content -->
            <div class="relative z-10 flex flex-col justify-between h-full px-16 py-10 text-center">

                <!-- Header -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-700 tracking-widest uppercase">
                        Certificate of Achievement
                    </h2>
                    <p class="text-sm text-gray-500 font-medium mt-1 tracking-wide uppercase">
                        Proudly Presented To
                    </p>
                </div>

                <!-- Name -->
                <!-- Name -->
                <div>
                    <h1 class="text-5xl font-extrabold text-blue-900 tracking-wide cert-name uppercase drop-shadow-md">
                        {{ strtoupper($certificate->name) }}
                    </h1>

                    <div class="w-64 mx-auto border-t-2 border-gray-400 my-2"></div>

                    <div class="text-gray-700 mt-2 mx-auto text-lg italic drop-shadow-sm w-90-percent jp-text">
                        {!! $certificate->description !!}
                    </div>

                    <h2 class="text-5xl font-bold text-red-700 mt-8 uppercase tracking-widest drop-shadow-lg">
                        {{ strtoupper($certificate->category->name) }}
                    </h2>
                </div>

                <!-- Issue date -->
                <div class="flex justify-center items-center gap-2 mt-6 text-gray-700 text-base">
                    <span class="font-semibold">Issued on:</span>
                    @php
                        $date = DateTime::createFromFormat('Y-m-d', $certificate->reg_date);
                    @endphp
                    <span class="border-b border-gray-500 px-2">{{ $date->format('d') }}</span> /
                    <span class="border-b border-gray-500 px-4">{{ $date->format('F') }}</span> /
                    <span class="border-b border-gray-500 px-2">{{ $date->format('Y') }}</span>
                </div>

                <!-- Footer -->
                <div class="relative top-[0px] bottom-part">
                    <div class="flex justify-between items-center">

                        <!-- Logo -->
                        <div class="flex flex-col items-center ml-6">
                            <img src="{{ asset('img/JDU-logo1.png') }}" alt="JDU Logo" class="w-44 h-auto">
                        </div>


                        <!-- Rector -->
                        <div class="text-center ml-2">
                            <p class="font-semibold text-lg">R. MAMAJONOV</p>
                            <p class="font-semibold text-sm text-gray-700">Rector of Japan Digital University</p>
                        </div>

                        <!-- Seal -->
                        <div class="mr-6 flex justify-end">
                            <img src="{{ asset('img/verified.png') }}" alt="Seal" class="w-40 h-auto object-contain">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>
