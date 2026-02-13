<x-layout title="IT Challenge Certificate">

{{--    <button onclick="printDiv('document-card')"--}}
{{--            class="absolute top-6 right-6 bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">--}}
{{--        PDF--}}
{{--    </button>--}}

    <div class="w-full min-h-screen flex items-center justify-center bg-gray-200">

        <!-- 🔥 REAL CERTIFICATE SIZE -->
        <div id="document-card"
             class="document-card relative
                w-[1100px]
                h-[750px]
                rounded-2xl
                overflow-hidden
                shadow-[0_40px_120px_rgba(0,0,0,0.45)]">

            <!-- Background -->
            <img src="{{ asset('img/bg2.png') }}"
                 class="bg-img">

            <!-- CONTENT -->
            <div class="cert-content relative z-10 flex flex-col justify-between h-full
                    pl-64 pr-28 py-16
                    text-white text-center">
                <div class="cert-texts">
                    <!-- HEADER -->
                    <div class="mt-2">
                        <h1 class="text-8xl font-extrabold tracking-widest">
                            CERTIFICATE
                        </h1>

                        <p class="uppercase tracking-[8px] mt-6 text-3xl font-bold texts01">
                            {{$certificate->category->name}}
                        </p>

                        <p class="mt-6 text-gray-200 text-2xl texts01">
                            IS PRESENTED TO :
                        </p>
                    </div>


                    <!-- NAME -->
                    <div class="mt-10 texts1">

                        <h2 class="text-[52px] font-bold leading-tight tracking-wide cert-name">
                            {{ strtoupper($certificate->name) }}
                        </h2>

                        <div class="w-[420px] h-[3px] bg-red-600 mx-auto my-4"></div>

                        <p class="text-base max-w-xl mx-auto text-gray-100 cert-description">
                            {!! $certificate->description !!}
                            @php
                                $date = DateTime::createFromFormat('Y-m-d', $certificate->reg_date);
                            @endphp
                            <br/>
                            on {{ $date->format('F') }} {{$date->format('d') }}, {{ $date->format('Y') }}.
                        </p>
                        </p>

                    </div>
                </div>



                <!-- FOOTER -->
                <div class="flex justify-between items-end relative bottom-cert left-[30px] mt-4">

                    <!-- LEFT -->
                    <img src="{{ asset('img/logo2.png') }}"
                         class="w-44 h-auto opacity-95 relative right-[70px] logo2">

{{--                    center--}}
                    <div class="text-center">

                        <div class="relative bottom-20 right-[50px] rector1">
                            <p class="font-semibold text-base">
                                R. Mamajonov
                            </p>

                            <p class="text-xs w-60 text-gray-200 mt-2 tracking-wide">
                                RECTOR OF JAPAN DIGITAL UNIVERSITY
                            </p>
                        </div>

                    </div>




                    <!-- SEAL -->
                    <div class="flex justify-end relative right-[0px] top-0 verified2">
                        <img src="{{ asset('img/verified.png') }}" alt="Seal" class="w-44 h-auto object-contain">
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-layout>
