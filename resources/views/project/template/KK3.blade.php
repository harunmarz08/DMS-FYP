<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <x-nav-link2 :href="url()->route('project.tasks.index', ['project' => $project])">
                <svg width="12px" height="12px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path fill="rgb(55 65 81)" fill-rule="evenodd"
                        d="M2.29289,7.29289 L7.29289,2.29289 C7.68342,1.90237 8.31658,1.90237 8.70711,2.29289 C9.06759,2.65337923 9.09531923,3.22060645 8.79029769,3.61290152 L8.70711,3.70711 L4.41421,8 L8.70711,12.2929 C9.09763,12.6834 9.09763,13.3166 8.70711,13.7071 C8.34662077,14.0675615 7.77939355,14.0952893 7.38709848,13.7902834 L7.29289,13.7071 L2.29289,8.70711 C1.93241,8.34662077 1.90468077,7.77939355 2.20970231,7.38709848 L2.29289,7.29289 L7.29289,2.29289 L2.29289,7.29289 Z M7.29289,7.29289 L12.2929,2.29289 C12.6834,1.90237 13.3166,1.90237 13.7071,2.29289 C14.0675615,2.65337923 14.0952893,3.22060645 13.7902834,3.61290152 L13.7071,3.70711 L9.41421,8 L13.7071,12.2929 C14.0976,12.6834 14.0976,13.3166 13.7071,13.7071 C13.3466385,14.0675615 12.7793793,14.0952893 12.3871027,13.7902834 L12.2929,13.7071 L7.29289,8.70711 C6.93241,8.34662077 6.90468077,7.77939355 7.20970231,7.38709848 L7.29289,7.29289 L12.2929,2.29289 L7.29289,7.29289 Z" />
                </svg>
                {{-- {{ session('project-name') }} --}}
                {{ $project->name }}
                {{ __('KK3') }}
            </x-nav-link2>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(isset($statusDraft) && $statusDraft == 'Saved successfully')
                <div class="max-w-7xl text-center">
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => { show = false; {{ isset($statusDraft) ? 'unset($statusDraft);' : '' }} }, 2000)"
                        class="text-sm text-white bg-green-400 border border-green-400 rounded-md p-2">
                        {{ __('Saved successfully') }}
                    </p>
                </div>
            @elseif(isset($statusDraft) && $statusDraft == 'Unsuccessful')
                <div class="max-w-7xl text-center">
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => { show = false; {{ isset($statusDraft) ? 'unset($statusDraft);' : '' }} }, 2000)"
                        class="text-sm text-gray-800 bg-red-500 border border-red-500 rounded-md p-2">
                        {{ __('Unsuccessful.') }}
                    </p>
                </div>
            @endif
            <div class="py-2">
                <form id="multi-action-form" method="POST">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        @csrf
                        @method('post')
                        <div class="p-4 m-4">
                            <h2 class="text-lg font-medium text-gray-900 py-2">
                                {{ __('CADANGAN SEMAKAN KURIKULUM PROGRAM') }}
                            </h2>
                            {{-- Item 1 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="text-left col-span-2">1. UNIVERSITI AWAM</div>
                                <div class="text-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4 ">Nama Universiti</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it1" :value="$template_contents->data2['it1']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 2 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="text-left col-span-2">2. TUJUAN</div>
                                <div class="text-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan Tujuan</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="tujuan" :value="$template_contents->data2['tujuan']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 3 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="text-left col-span-2">3. VISI, MISI & MATLAMAT PENDIDIKAN UNIVERSITI</div>
                                <div class="text-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Visi</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="visi" :value="$template_contents->data2['visi']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">Misi</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="misi" :value="$template_contents->data2['misi']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">Matlamat</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="matlamat" :value="$template_contents->data2['matlamat']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 4 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="text-left col-span-2">4. BIDANG TUJAHAN UNIVERSITI</div>
                                <div class="text-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan bidang tujahan universiti.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it4" :value="$template_contents->data2['it4']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 5 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="text-left col-span-2">5. ENTITI AKADEMIK YANG MEMOHON</div>
                                <div class="text-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">5.1. Nyatakan nama penuh entiti akademik yang
                                        memohon semakan kurikulum.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it5_1" :value="$template_contents->data2['it5_1']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">5.2. Nyatakan program akademik sedia ada di
                                        entiti akademik yang memohon semakan kurikulum</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it5_2" :value="$template_contents->data2['it5_2']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 6 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="text-left col-span-2">6. LOKASI PENAWARAN</div>
                                <div class="text-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">6.1. Nyatakan lokasi program akademik yang akan dijalankan.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it6_1" :value="$template_contents->data2['it6_1']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">6.2. Nyatakan lokasi baharu yang dicadangkan &#40;jika berkaitan&#41;</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it6_2" :value="$template_contents->data2['it6_2']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">6.3. Nyatakan kelulusan Audit Lokasi &#40;sekiranya berkaitan&#41;</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it6_3" :value="$template_contents->data2['it6_3']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 7 - Table --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="text-left col-span-2">7. PROGRAM AKADEMIK YANG DISEMAK</div>
                                <div class="text-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">7.1. Nama program yang disemak dalam Bahasa Melayu dan Bahasa Inggeris.</h1>
                                    <h1 class="text-m font-semibold mb-4">Bahasa Melayu</h1>
                                    <div class="overflow-x-auto">
                                        <table class="table-fixed border-collapse border border-gray-200 w-2/3">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2">Kod</th>
                                                    <th class="border border-gray-300 px-4 py-2 w-2/3">Nama Program</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it7_bmk" numCols="20" :value="$template_contents->data2['it7_bmk']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it7_bmp" numCols="30" :value="$template_contents->data2['it7_bmp']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <h1 class="text-m font-semibold mb-4">Bahasa Inggeris</h1>
                                    <div class="overflow-x-auto">
                                        <table class="table-fixed border-collapse border border-gray-200 w-2/3">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2">Kod</th>
                                                    <th class="border border-gray-300 px-4 py-2 w-2/3">Nama Program</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it7_enk" numCols="20" :value="$template_contents->data2['it7_enk']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it7_enp" numCols="30" :value="$template_contents->data2['it7_enp']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <h1 class="text-l font-semibold mb-4">Nama penganugerahan program dalam Bahasa Melayu dan Bahasa Inggeris</h1>
                                    <h1 class="text-m font-semibold mb-4">Bahasa Melayu</h1>
                                    <div class="overflow-x-auto">
                                        <table class="table-fixed border-collapse border border-gray-200 w-1/3">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2 w-1/5">Nama Penganugerahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it7_bma" numCols="20" :value="$template_contents->data2['it7_bma']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <h1 class="text-m font-semibold mb-4">Bahasa Inggeris</h1>
                                    <div class="overflow-x-auto">
                                        <table class="table-fixed border-collapse border border-gray-200 w-1/3">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2 w-1/5">Nama Penganugerahan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it7_ena" numCols="20" :value="$template_contents->data2['it7_ena']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                </div>
                            </x-directory>

                            {{-- Item 8 - Table - Check Box --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">8. TAHAP KERANGKA KELAYAKAN MALAYSIA &#40;MQF&#41;
                                </div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-m font-semibold mb-4">Nyatakan tahap Kerangka kelayakan Malaysia
                                        &#40;MQF&#41; program yang disemak. Sila tandakan &#40;/&#41; </h1>
                                    <div class="overflow-x-auto">
                                        <table class="table-fixed w-full border-collapse border border-gray-200 ">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2 ">Diploma &#40;4&#41; </th>
                                                    <th class="border border-gray-300 px-4 py-2 ">Sarjana Muda &#40;6&#41;
                                                    </th>
                                                    <th class="border border-gray-300 px-4 py-2 ">Sarjana &#40;7&#41; </th>
                                                    <th class="border border-gray-300 px-4 py-2 ">Kedoktoran &#40;8&#41; </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it8_cb1" numCols="20" :value="$template_contents->data2['it8_cb1']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it8_cb2" numCols="20" :value="$template_contents->data2['it8_cb2']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it8_cb3" numCols="20" :value="$template_contents->data2['it8_cb3']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it8_cb4" numCols="20" :value="$template_contents->data2['it8_cb4']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br>
                                </div>
                            </x-directory>

                            {{-- Item 9 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="text-left col-span-2">9. NATIONAL EDUCATIONAL CODE &#40;NEC&#41;</div>
                                <div class="text-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan kod bidang program akademik tersebut berdasarkan manual NEC.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it9" :value="$template_contents->data2['it9']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>
                            
                            {{-- Item 10 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">10. PENGIKTIRAFAN BADAN PROFESIONAL</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan sama ada program akademik perlu
                                        diiktiraf oleh mana-mana badan profesional. </h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it10" :value="$template_contents->data2['it10']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 11 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="text-left col-span-2">11. KEPERLUAN STANDARD</div>
                                <div class="text-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan standard program MQA yang
                                        digunapakai.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it11" :value="$template_contents->data2['it11']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 12 - appendix --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="text-left col-span-2">12. INSTITUSI/ ORGANISASI KERJASAMA</div>
                                <div class="text-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Sekiranya ia melibatkan penawaran bersama
                                        institusi/organisasi lain, nyatakan nama institusi/organisasi dan nama program
                                        yang berkaitan di institusi/organisasi berkenaan.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it12" :value="$template_contents->data2['it12']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">Sila lampirkan Letter of Intent
                                        &#40;LoI&#41;/Memorandum of Understanding &#40;MoU&#41;/ Memorandum of Agreement &#40;MoA&#41;.</h1>
                                </div>
                            </x-directory>

                            {{-- Item 13 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">13. SESI PENGAJIAN KURIKULUM YANG DISEMAK SEMULA BERKUATKUASA </div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan semester dan sesi pengajian program akademik akan dimulakan.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it13" :value="$template_contents->data2['it13']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 14 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">14. MOD PENAWARAN</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan mod penawaran sama ada kerja kursus,
                                        penyelidikan, campuran dan mod industri.</br> Bagi mod industri, nyatakan status mod penawaran semasa sama ada diteruskan atau
                                        tidak </h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it14" :value="$template_contents->data2['it14']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 15 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">15. KREDIT BERGRADUAT</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan jumlah kredit bergraduat program akademik tersebut.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it15" :value="$template_contents->data2['it15']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 16 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">16. KAEDAH DAN TEMPOH PENGAJIAN</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">16.1 Nyatakan kaedah pengajian sama ada secara sepenuh masa atau separuh masa.</h1>
                                    <h1 class="text-l font-semibold mb-4">16.2 Nyatakan tempoh minimum dan maksimum pengajian.</h1>
                                    <table class="table-fixed  border-collapse border border-gray-200 w-3/4">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-4 py-2 ">Kaedah Pengajian</th>
                                                <th class="border border-gray-300 px-4 py-2 ">Tempoh Minimum </th>
                                                <th class="border border-gray-300 px-4 py-2 ">Tempoh Maksimum </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-300 ">
                                                    Sepenuh Masa
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it16_1" numCols="20" :value="$template_contents->data2['it16_1']" :disabled="auth()->user()->role == 2"/>
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it16_2" numCols="20" :value="$template_contents->data2['it16_2']" :disabled="auth()->user()->role == 2"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 ">
                                                    Separuh Masa
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it16_3" numCols="20" :value="$template_contents->data2['it16_3']" :disabled="auth()->user()->role == 2"/>
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it16_4" numCols="20" :value="$template_contents->data2['it16_4']" :disabled="auth()->user()->role == 2"/>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h1 class="text-l font-semibold mb-4">16.3 Nyatakan dengan jelas sekiranya terdapat gabungan semester panjang dan semester pendek.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it16_5" :value="$template_contents->data2['it16_5']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 17 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">17. KAEDAH PENYAMPAIAN PROGRAM</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">17.1. Kaedah Penyampaian &#40;Sila tandakan &#40;/&#41;&#41;</h1>
                                    <table class="table-fixed  border-collapse border border-gray-200 w-3/4">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-4 py-2 w-1/3">Kaedah Pengajian</th>
                                                <th class="border border-gray-300 px-4 py-2 ">Tempoh Minimum</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">Sepenuh Masa</td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it17_1cb1" numCols="20" :value="$template_contents->data2['it17_1cb1']" :disabled="auth()->user()->role == 2"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">Separuh Masa</td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it17_1cb2" numCols="20" :value="$template_contents->data2['it17_1cb2']" :disabled="auth()->user()->role == 2"/>
                                                </td>
                                            </tr>                                            
                                        </tbody>
                                    </table><br>
                                    <h1 class="text-l font-semibold mb-4">17.2. Nyatakan Pembelajaran dan Pengajaran
                                        &#40;PdP&#41; yang transformatif berasaskan penyampaian abad ke-21 menerusi ruang pembelajaran yang
                                        futuristik serta penggunaan teknologi digital terkini bagi mewujudkan pembelajaran imersif berdasarkan pengalaman.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it17_2" :value="$template_contents->data2['it17_2']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 18 - List --}}
                            <x-directory color="white" class="grid grid-cols-6 gap-4 p-4">
                                <div class="text-left col-span-2">18. JUSTIFIKASI SEMAKAN KURIKULUM</div>
                                <div class="text-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan justifikasi yang merangkumi rasional berikut &#40;mana yang berkaitan&#41;:</h1>
                                    <h1 class="text-l font-semibold mb-4">18.1. Unjuran statistik keperluan pekerjaan di sektor awam dan swasta bagi tempoh 5 tahun.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_1" :value="$template_contents->data2['it18_1']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.2. Jenis pekerjaan yang berkaitan dan jumlah keperluan industri. Hasil dapatan Labour Force Survey &#40;LFS&#41; boleh digunakan sebagai sumber rujukan.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_2" :value="$template_contents->data2['it18_2']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.3. Peratus Kebolehpasaran Graduan &#40;Graduate Employability&#41; bagi entiti akademik dan universiti yang ingin menawarkan program akademik baharu.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_3" :value="$template_contents->data2['it18_3']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.4. Faktor perkembangan dan perubahan teknologi.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_4" :value="$template_contents->data2['it18_4']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.5. Perubahan standard program.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_5" :value="$template_contents->data2['it18_5']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.6. Kajian pasaran.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_6" :value="$template_contents->data2['it18_6']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.7. Laporan Penilai/Pemeriksa Luar.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_7" :value="$template_contents->data2['it18_7']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.8. Laporan Penambahbaikan Kualiti Berterusan &#40;Continual Quality Improvement, CQI&#41;.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_8" :value="$template_contents->data2['it18_8']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.9. Analisis Dapatan Pemegang Taruh.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_9" :value="$template_contents->data2['it18_9']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.10. Penandaarasan.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_10" :value="$template_contents->data2['it18_10']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.11. Keperluan semasa dalam bidang.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_11" :value="$template_contents->data2['it18_11']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.12. Amalan Pendidikan Berimpak Tinggi &#40;High Impact Educational Practices, HEIPS&#41;.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_12" :value="$template_contents->data2['it18_12']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.13. Konsolidasi atau Segregasi.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_13" :value="$template_contents->data2['it18_13']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">18.14. Lain-lain justifikasi yang berkaitan.</h1>
                                    {{-- <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_14" :value="$template_contents->data2['it18_14']"/> --}}
                                    
                                        <div id="inputContainer">
                                            <!-- Display existing data3['it18_ex'] fields -->
                                            @if(isset($template_contents->data3['it18_ex']))
                                                @foreach($template_contents->data3['it18_ex'] as $index => $value)
                                                    <div class="input-group" id="input-group-{{ $index }}">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_ex[{{ $index }}]" :value="$value" :disabled="auth()->user()->role == 2"/>
                                                        <button type="button" class="remove-btn border" onclick="removeInput({{ $index }})" {{ auth()->user()->role == 2 ? 'disabled' : '' }}>Remove</button>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        @if (auth()->user()->role == 2)
                                            <div></div>
                                        @else
                                        <button type="button" class="btn border" id="add">Add</button>
                                        @endif
                                        
                                        
                                        <script>
                                            var i = {{ isset($template_contents->data3['it18_ex']) ? count($template_contents->data3['it18_ex']) : 0 }};
                                        
                                            document.getElementById('add').addEventListener('click', function () {
                                                var container = document.createElement('div');
                                                container.className = 'input-group';
                                                container.id = 'input-group-' + i;
                                                container.innerHTML = `
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it18_ex[${i}]" />
                                                    <button type="button" class="remove-btn border" onclick="removeInput(${i})" {{ auth()->user()->role == 2 ? 'disabled' : '' }}>Remove</button>
                                                `;
                                                document.getElementById('inputContainer').appendChild(container);
                                                i++;
                                            });
                                        
                                            function removeInput(index) {
                                                var element = document.getElementById('input-group-' + index);
                                                if (element) {
                                                    element.remove();
                                                }
                                            }
                                        </script>
                                                                        
                                </div>
                            </x-directory>

                            {{-- Item 19 - List --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">19. KELESTARIAN PROGRAM </div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan kelestarian program dengan memfokuskan
                                        kepada isu sejauh manakah program dijangka bertahan di pasaran</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it19" :value="$template_contents->data2['it19']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 20 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">20. OBJEKTIF PENDIDIKAN PROGRAM</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan Objektif Pendidikan Program &#40;PEO&#41;.
                                        Tunjukkan matriks PEO lawan Matlamat Pendidikan universiti</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it20" :value="$template_contents->data2['it20']" :disabled="auth()->user()->role == 2"/>                                    
                                </div>
                            </x-directory>

                            {{-- Item 21 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">21. HASIL PEMBELAJARAN PROGRAM</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">21.1. Nyatakan keupayaan keterampilan kompetensi khusus &#40;specific competencies&#41; yang akan ditunjukkan oleh pelajar di akhir program, seperti domain yang dinyatakan dalam MQF dan standard program &#40;jika berkaitan&#41;.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it21_1" :value="$template_contents->data2['it21_1']" :disabled="auth()->user()->role == 2" />
                                    <h1 class="text-l font-semibold mb-4">21.2. Tunjukkan matriks Hasil Pembelajaran Program &#40;PLO&#41; lawan Objektif Pendidikan Program (PEO).</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it21_2" :value="$template_contents->data2['it21_2']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">21.3. Nyatakan kelulusan Audit Lokasi &#40;sekiranya berkaitan&#41;</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it21_3" :value="$template_contents->data2['it21_3']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 22 - Table - appendix --}}
                            <x-directory color="white" class="grid grid-cols-6 gap-4">
                                <div class="justify-self-start col-span-2 font-semibold">22. KOMPONEN/ MAKLUMAT YANG DIUBAH DAN STRUKTUR KURIKULUM BAHARU </div>
                                <div class="justify-self-start col-span-4">
                                    <h1 class="text-l font-semibold mb-4">22.1. Nyatakan perubahan komponen/maklumat program untuk kategori perubahan maklumat. Rujuk Klasifikasi Komponen Perubahan Kurikulum &#40;QRIM&#41;.</h1>
                                    <div class="overflow-x-auto">
                                        <table class="table-fixed w-full border-collapse border border-gray-200">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2 w-1/5 text-left" rowspan="2">Komponen Program</th>
                                                    <th class="border border-gray-300 px-4 py-2 w-1/5 text-left" rowspan="2">Komponen Semakan</th>
                                                    <th class="border border-gray-300 px-4 py-2" colspan="2">Deskripsi Perubahan Semakan Kurikulum</th>
                                                </tr>
                                                <tr class="bg-gray-200">
                                                    <th class="border border-gray-300 px-4 py-2 text-left">Berubah</th>
                                                    <th class="border border-gray-300 px-4 py-2 text-left">Tidak Berubah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2 font-semibold">Nama</td>
                                                    <td class="border border-gray-300 px-4 py-2 text-left">Nama Program</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_1_en" numCols="30" :value="$template_contents->data2['it22_1_en']" :disabled="auth()->user()->role == 2" />
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_1_bm" numCols="30" :value="$template_contents->data2['it22_1_bm']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_1x" numCols="30" :value="$template_contents->data2['it22_1x']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                </tr>
                                                <div name="stack-row1">
                                                    <tr>
                                                        <td class="border border-gray-300 px-4 py-2 font-semibold" rowspan="2">Kod</td>
                                                        <td class="border border-gray-300 px-4 py-2 text-left">National Education Code &#40;NEC&#41;</td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_2a" numCols="30" :value="$template_contents->data2['it22_2a']" :disabled="auth()->user()->role == 2" />
                                                        </td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_2ax" numCols="30" :value="$template_contents->data2['it22_2ax']" :disabled="auth()->user()->role == 2" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-300 px-4 py-2">Kod Program &#40;dalaman&#41;</td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_2b" numCols="30" :value="$template_contents->data2['it22_2b']" :disabled="auth()->user()->role == 2" />
                                                        </td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_2bx" numCols="30" :value="$template_contents->data2['it22_2bx']" :disabled="auth()->user()->role == 2" />
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div name="stack-row2">
                                                    <tr>
                                                        <td class="border border-gray-300 px-4 py-2 font-semibold" rowspan="2">Lokasi / Entiti Akademik</td>
                                                        <td class="border border-gray-300 px-4 py-2 text-left">Lokasi Penawaran</td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_3a" numCols="30" :value="$template_contents->data2['it22_3a']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_3ax" numCols="30" :value="$template_contents->data2['it22_3ax']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-300 px-4 py-2">Entiti Akademik</td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_3b" numCols="30" :value="$template_contents->data2['it22_3b']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_3bx" numCols="30" :value="$template_contents->data2['it22_3bx']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div name="stack-row3">
                                                    <tr>
                                                        <td class="border border-gray-300 px-4 py-2 font-semibold"
                                                            rowspan="2">PEO dan PLO </td>
                                                        <td class="border border-gray-300 px-4 py-2 text-left"
                                                            rowspan="2">Kandungan DAN Bilangan Pernyataan</td>
                                                        <td class="border border-gray-300 ">
                                                            <x-input-label for="it22_4peo1">1. PEO digugur DAN diganti</x-input-label>
                                                            <x-expanding-textarea id="it22_4peo1" name="it22_4peo1" placeholder="Type here..." numCols="30" class="w-full" name="it22_4peo1" :value="$template_contents->data2['it22_4peo1']" :disabled="auth()->user()->role == 2"/>
                                                            <x-input-label for="it22_4peo2">2. PEO digugurkan TANPA diganti</x-input-label>
                                                            <x-expanding-textarea id="it22_4peo2" name="it22_4peo2" placeholder="Type here..." numCols="30" class="w-full" name="it22_4peo2" :value="$template_contents->data2['it22_4peo2']" :disabled="auth()->user()->role == 2"/>
                                                            <x-input-label for="it22_4peo2">3. PEO ditambah</x-input-label>
                                                            <x-expanding-textarea id="it22_4peo3" name="it22_4peo3" placeholder="Type here..." numCols="30" class="w-full" name="it22_4peo3" :value="$template_contents->data2['it22_4peo3']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_4peox" numCols="30" :value="$template_contents->data2['it22_4peox']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-300 ">
                                                            <x-input-label for="it22_4peo2">1. PLO digugurkan DAN diganti</x-input-label>
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_4plo1" numCols="30" :value="$template_contents->data2['it22_4plo1']" :disabled="auth()->user()->role == 2"/>
                                                            <x-input-label for="it22_4peo2">2. PLO digugurkan TANPA diganti</x-input-label>
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_4plo2" numCols="30" :value="$template_contents->data2['it22_4plo2']" :disabled="auth()->user()->role == 2"/>
                                                            <x-input-label for="it22_4peo2">3. PLO ditambah</x-input-label>
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_4plo3" numCols="30" :value="$template_contents->data2['it22_4plo3']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_4plox" numCols="30" :value="$template_contents->data2['it22_4plox']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div name="stack-row4">
                                                    <tr>
                                                        <td class="border border-gray-300 px-4 py-2 font-semibold"
                                                            rowspan="5">Struktur Kurikulum</td>
                                                        <td class="border border-gray-300 px-4 py-2 text-left">a. Tempoh Pengajian</td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_5a" numCols="30" :value="$template_contents->data2['it22_5a']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_5ax" numCols="30" :value="$template_contents->data2['it22_5ax']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-300 px-4 py-2 text-left">b. Kaedah Pengajian</td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_5b" numCols="30" :value="$template_contents->data2['it22_5b']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_5bx" numCols="30" :value="$template_contents->data2['it22_5bx']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-300 px-4 py-2 text-left">c. Kaedah Penyampaian</td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_5c" numCols="30" :value="$template_contents->data2['it22_5c']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_5cx" numCols="30" :value="$template_contents->data2['it22_5cx']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-300 px-4 py-2 text-left">d. Mod Penawaran</td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_5d" numCols="30" :value="$template_contents->data2['it22_5d']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_5dx" numCols="30" :value="$template_contents->data2['it22_5dx']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-gray-300 px-4 py-2 text-left">e. Jumlah Jam Kredit Keseluruhan</td>
                                                        <td class="border border-gray-300 ">
                                                            <div class="flex flex-row">
                                                                <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_5e" numCols="30" :value="$template_contents->data2['it22_5e']" :disabled="auth()->user()->role == 2"/>
                                                                <a class="cursor-pointer" x-data="" x-on:click.prevent="$dispatch('open-modal', 'notes5')">
                                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v13a2 2 0 01-2 2z">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                            </div>

                                                            <x-modal name="notes5" focusable>
                                                                <div class="bg-white p-6 rounded shadow-lg z-50">
                                                                    <h2 class="text-xl font-semibold mb-4">Notes</h2>
                                                                    <p class="">Pengurangan ATAU
                                                                        pertambahan jumlah jam kredit.
                                                                        Perubahan termasuk: <br>
                                                                        - Kredit kursus baharu <br>
                                                                        - Kredit kursus sedia ada yang digugurkan <br>
                                                                        - Kredit kursus yang berubah taraf &#40;teras
                                                                        menjadi elektif dan sebaliknya&#41; <br>
                                                                        - Kredit kursus sedia ada yang distruktur semula
                                                                        &#40;perubahan melebihi 30% pada CLO - kursus dikira
                                                                        sebagai kursus baharu &#40;melibatkan perubahan nama
                                                                        dan kod&#41;&#41; <br>
                                                                        - Perbezaan kredit kursus sedia ada yang
                                                                        melibatkan perubahan pada jam kredit &#40;yang
                                                                        semestinya melibatkan perubahan kepada CLO&#41; <br>
                                                                        Lain-lain maklumat: <br>
                                                                        - Kursus teras dan elektif sahaja yang diambil
                                                                        kira dalam pengiraan perubahan kredit. <br>
                                                                        - Pengiraan tidak melibatkan </p>
                                                                </div>
                                                            </x-modal>
                                                        </td>
                                                        <td class="border border-gray-300 ">
                                                            <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_5ex" numCols="30" :value="$template_contents->data2['it22_5ex']" :disabled="auth()->user()->role == 2"/>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2 font-semibold">Maklumat
                                                        Kursus
                                                    </td>
                                                    <td class="border border-gray-300 px-4 py-2 text-left">Perubahan
                                                        kepada
                                                        Hasil Pembelajaran
                                                        Kursus &#40;CLO&#41;</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-input-label for="it22_6clo1">
                                                            1. CLO digugurkan DAN diganti
                                                        </x-input-label>
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_6clo1" numCols="30" :value="$template_contents->data2['it22_6clo1']" :disabled="auth()->user()->role == 2"/>
                                                        <x-input-label for="it22_6clo2">
                                                            2. CLO digugurkan TANPA diganti
                                                        </x-input-label>
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_6clo2" numCols="30" :value="$template_contents->data2['it22_6clo2']" :disabled="auth()->user()->role == 2"/>
                                                        <x-input-label for="it22_6clo3">
                                                            3. CLO ditambah
                                                        </x-input-label>
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_6clo3" numCols="30" :value="$template_contents->data2['it22_6clo3']" :disabled="auth()->user()->role == 2"/>
                                                        <div class="flex flex-row">
                                                            <a class="cursor-pointer" x-data="" x-on:click.prevent="$dispatch('open-modal', 'notes6')">
                                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 12h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v13a2 2 0 01-2 2z">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                        </div>

                                                        <x-modal name="notes6" focusable>
                                                            <div class="bg-white p-6 rounded shadow-lg z-50">
                                                                <h2 class="text-xl font-semibold mb-4">Notes</h2>
                                                                <p class="">Perubahan bilangan CLO lebih daripada 30%; kursus dikira sebagai kursus baharu &#40;selalunya melibatkan perubahan nama dan kod&#41;</p>
                                                            </div>
                                                        </x-modal>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_6x" numCols="30" :value="$template_contents->data2['it22_6x']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table><br>
                                    </div>
                                    <h1 class="text-l font-semibold mb-4">22.2. Kaedah Peratus Perubahan Semakan Kurikulum
                                        Program </h1>
                                    <div class="overflow-x-auto">
                                        <table class="table-fixed border-collapse border border-gray-200">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2 w-1/12">Bil</th>
                                                    <th class="border border-gray-300 px-4 py-2 text-left">Kategori Kursus</th>
                                                    <th class="border border-gray-300 px-4 py-2 text-left">Jumlah kredit kursus sedia ada </th>
                                                    <th class="border border-gray-300 px-4 py-2 text-left">Jumlah kredit kursus selepas semakan kurikulum</th>
                                                    <th class="border border-gray-300 px-4 py-2 text-left">Jumlah perubahan semakan kurikulum</th>
                                                    <th class="border border-gray-300 px-4 py-2 text-left">Peratus Perubahan </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2"> 1 </td>
                                                    <td class="border border-gray-300 px-4 py-2"> Kursus Umum </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_71a" numCols="20" :value="$template_contents->data2['it22_71a']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_71b" numCols="20" :value="$template_contents->data2['it22_71b']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                    <td class="border border-gray-300 px-4 py-2"> N/A </td>
                                                    <td class="border border-gray-300 px-4 py-2"> N/A </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2"> 2 </td>
                                                    <td class="border border-gray-300 px-4 py-2"> Kursus Teras </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_72a" numCols="20" :value="$template_contents->data2['it22_72a']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_72b" numCols="20" :value="$template_contents->data2['it22_72b']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_72c" numCols="20" :value="$template_contents->data2['it22_72c']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_72p" numCols="20" :value="$template_contents->data2['it22_72p']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2"> 3 </td>
                                                    <td class="border border-gray-300 px-4 py-2"> Kursus Elektif </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_73a" numCols="20" :value="$template_contents->data2['it22_73a']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_73b" numCols="20" :value="$template_contents->data2['it22_73b']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_73c" numCols="20" :value="$template_contents->data2['it22_73c']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_73p" numCols="20" :value="$template_contents->data2['it22_73p']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2"> </td>
                                                    <td class="border border-gray-300 px-4 py-2 font-bold"> Jumlah </td>
                                                    <td class="border border-gray-300 px-4 py-2 font-bold"> A </td>
                                                    <td class="border border-gray-300 px-4 py-2 font-bold"> B </td>
                                                    <td class="border border-gray-300 px-4 py-2 font-bold"> C </td>
                                                    <td class="border border-gray-300 px-4 py-2 font-bold"> % </td>
                                                </tr>
                                            </tbody>
                                        </table><br>
                                    </div>
                                    <h1 class="text-l font-semibold mb-4">22.3. Lampirkan struktur kurikulum dan pelan pengajian terkini. &#40;Isi nama lampiran cth. Lampiran S,Lampiran 22&#41; </h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it22_8" :value="$template_contents->data2['it22_8']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 23 - Table --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">23. UNJURAN PELAJAR</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan unjuran, enrolmen dan keluaran pelajar dalam tempoh lima &#40;5&#41; tahun.</h1>
                                    <div class="overflow-x-auto">
                                        <table class="table-fixed border-collapse border border-gray-200">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2 ">Tahun</th>
                                                    <th class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_1a" numCols="20" :value="$template_contents->data2['it23_1a']" :disabled="auth()->user()->role == 2"/>
                                                    </th>
                                                    <th class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_1b" numCols="20" :value="$template_contents->data2['it23_1b']" :disabled="auth()->user()->role == 2"/>
                                                    </th>
                                                    <th class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_1c" numCols="20" :value="$template_contents->data2['it23_1c']" :disabled="auth()->user()->role == 2"/>
                                                    </th>
                                                    <th class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_1d" numCols="20" :value="$template_contents->data2['it23_1d']" :disabled="auth()->user()->role == 2"/>
                                                    </th>
                                                    <th class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_1e" numCols="20" :value="$template_contents->data2['it23_1e']" :disabled="auth()->user()->role == 2"/>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2"> Unjuran </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_2a" numCols="20" :value="$template_contents->data2['it23_2a']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_2b" numCols="20" :value="$template_contents->data2['it23_2b']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_2c" numCols="20" :value="$template_contents->data2['it23_2c']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_2d" numCols="20" :value="$template_contents->data2['it23_2d']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_2e" numCols="20" :value="$template_contents->data2['it23_2e']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2"> Enrolmen </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_3a" numCols="20" :value="$template_contents->data2['it23_3a']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_3b" numCols="20" :value="$template_contents->data2['it23_3b']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_3c" numCols="20" :value="$template_contents->data2['it23_3c']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_3d" numCols="20" :value="$template_contents->data2['it23_3d']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_3e" numCols="20" :value="$template_contents->data2['it23_3e']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2"> Keluaran </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_4a" numCols="20" :value="$template_contents->data2['it23_4a']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_4b" numCols="20" :value="$template_contents->data2['it23_4b']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_4c" numCols="20" :value="$template_contents->data2['it23_4c']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_4d" numCols="20" :value="$template_contents->data2['it23_4d']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it23_4e" numCols="20" :value="$template_contents->data2['it23_4e']" :disabled="auth()->user()->role == 2" />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table><br>
                                    </div>
                                </div>
                            </x-directory>

                            {{-- Item 24 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">24. SYARAT KEMASUKAN</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">24.1. Nyatakan syarat am, khusus dan syarat khas kemasukan/ program.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it24_1" :value="$template_contents->data2['it24_1']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">24.2. Nyatakan keperluan kelayakan asas termasuk Band MUET</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it24_2" :value="$template_contents->data2['it24_2']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">24.3. Nyatakan keperluan dan kemahiran prasyarat serta syarat/kelayakan lain jika diperlukan.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it24_3" :value="$template_contents->data2['it24_3']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">24.4. Nyatakan keperluan pelajar untuk mengambil apa-apa kursus khas bagi mereka yang tidak memenuhi kriteria kemasukan, syarat am dan khusus mengikut kelulusan Senat.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it24_4" :value="$template_contents->data2['it24_4']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">24.5. Nyatakan kategori OKU yang diterima masuk ke program ini.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it24_5" :value="$template_contents->data2['it24_5']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 25 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">25. PERBANDINGAN PROGRAM AKADEMIK YANG DISEMAK DENGAN UNIVERSITI LAIN DALAM NEGARA/ PERTINDIHAN PROGRAM</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">25.1. Nyatakan program yang sama atau hampir sama
                                        di universiti lain &#40;awam dan swasta&#41; dalam negara/pertindihan program.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it25_1" :value="$template_contents->data2['it25_1']" :disabled="auth()->user()->role == 2" />
                                    <h1 class="text-l font-semibold mb-4">25.2. Nyatakan persamaan, perbezaan dan kekuatan program akademik 
                                        yang disemak dengan program universiti yang lain dalam negara yang dibandingkan.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it25_2" :value="$template_contents->data2['it25_2']" :disabled="auth()->user()->role == 2" />
                                </div>
                            </x-directory>

                            {{-- Item 26 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">26. PERBANDINGAN DENGAN PROGRAM AKADEMIK DI UNIVERSITI LUAR NEGARA</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">26.1. Nyatakan program yang sama atau hamper
                                        sama yang ditawarkan oleh universiti lain di luar negara.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it26_1" :value="$template_contents->data2['it26_1']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">26.2. Nyatakan persamaan, perbezaan dan
                                        kekuatan program akademik yang dipohon dengan program universiti yang lain dalam negara yang dibandingkan</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it26_2" :value="$template_contents->data2['it26_2']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 27 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">27. IMPLIKASI PERJAWATAN/ FIZIKAL DAN KEWANGAN</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">27.1. Nyatakan keperluan perjawatan sama ada memadai dengan perjawatan sedia ada atau penambahan baharu dengan mengambilkira elemen sinergi.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it27_1" :value="$template_contents->data2['it27_1']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">27.2. Nyatakan keperluan fizikal/infrastruktur sama ada memadai dengan keperluan fizikal/infrastruktur sedia ada atau penambahan baharu dengan mengambilkira elemen sinergi.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it27_2" :value="$template_contents->data2['it27_2']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">27.3. Nyatakan implikasi kewangan yang berkaitan.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it27_3" :value="$template_contents->data2['it27_3']" :disabled="auth()->user()->role == 2"/>
                                    <h1 class="text-l font-semibold mb-4">27.4. Nyatakan sama ada implikasi yang dinyatakan menggunakan peruntukan dalaman universiti atau memerlukan peruntukan tambahan daripada kementerian.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it27_4" :value="$template_contents->data2['it27_4']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 28 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">28. PENJUMUDAN/ PEMBEKUAN/ PELUPUSAN PROGRAM</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan program sedia ada yang telah/akan dijumudkan/dibekukan/dilupuskan.</h1>
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it28" :value="$template_contents->data2['it28']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Item 29 -Table --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">29. MAKLUMAT KELULUSAN ASAL PROGRAM AKADEMIK</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <div class="overflow-x-auto">
                                        <table class="table-fixed w-full border-collapse border border-gray-200 ">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2 w-1/4">Kelulusan </th>
                                                    <th class="border border-gray-300 px-4 py-2 ">Tarikh </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Kelulusan asal program oleh Senat</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it29_1" :value="$template_contents->data2['it29_1']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Kelulusan asal program oleh JKPT</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it29_2" :value="$template_contents->data2['it29_2']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Sesi program asal ditawarkan</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it29_3" :value="$template_contents->data2['it29_3']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h1 class="text-l font-semibold mb-4">Nyatakan nombor rujukan/kod QR akreditasi dalam Daftar Kelayakan Malaysia &#40;MQR&#41;</h1>
                                    </div><br>
                                </div>
                            </x-directory>

                            {{-- Item 30 -Table --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">PROGRAM AKADEMIK YANG DISEMAK</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan lokasi program akademik yang akan dijalankan.</h1>
                                    <div class="overflow-x-auto">
                                        <table class="table-fixed w-full border-collapse border border-gray-200 ">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2 w-1/4">Kelulusan </th>
                                                    <th class="border border-gray-300 px-4 py-2 ">Tarikh </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Tarikh Semakan Kurikulum Terdahulu oleh JKPT</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it30_1" :value="$template_contents->data2['it30_1']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Akreditasi Penuh/MQA</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it30_2" :value="$template_contents->data2['it30_2']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Sesi program asal ditawarkan</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it30_3" :value="$template_contents->data2['it30_3']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Mesyuarat Jawatankuasa Akademik Fakulti &#40;JKAF&#41;</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it30_4" :value="$template_contents->data2['it30_4']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Mesyuarat Jawatankuasa Kurikulum Universiti &#40;JKKU&#41;</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it30_5" :value="$template_contents->data2['it30_5']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Mesyuarat Jawatankuasa Tetap Senat Kurikulum dan Kualiti Akademik &#40;JKTS KKA&#41;</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it30_6" :value="$template_contents->data2['it30_6']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Mesyuarat Senat</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it30_7" :value="$template_contents->data2['it30_7']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Mesyuarat Lembaga Pengarah Universiti</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it30_8" :value="$template_contents->data2['it30_8']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br>
                                </div>
                            </x-directory>

                            {{-- Item 31 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">31. KESIMPULAN/ SYOR</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Jawatankuasa Kurikulum Universiti dengan segala hormatnya dipohon untuk meluluskan </h1>
                                    <x-expanding-textarea placeholder="Nama kertas kerja" class="w-full" name="it31" :value="$template_contents->data2['it31']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>
                        </div>
                    </div>

                    <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-end py-4">
                                @if(auth()->user()->role != 2)
                                    <div class="flex justify-end py-4">
                                        <x-secondary-button id="save-draft" color="black"
                                            onclick="submitForm('{{ route('project.template.save-draft-main', ['project' => $project]) }}')"
                                            class="mx-1">
                                            Save Draft
                                        </x-secondary-button>
                                    </div>
                                @endif
                                {{-- <x-secondary-button color="black" class="mx-1">Preview</x-secondary-button>
                                <x-secondary-button color="black" class="mx-1">temp</x-secondary-button> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div id="loading-overlay"
                class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50 hidden">
                <div class="loader"></div>
            </div>
            <script>
                function submitForm(action) {
                    const form = document.getElementById('multi-action-form');
                    const loadingOverlay = document.getElementById('loading-overlay');

                    // Show the loading overlay
                    loadingOverlay.classList.remove('hidden');

                    // Set the form action and submit the form
                    form.action = action;
                    form.submit();
                }
            </script>

            <style>
                .loader {
                    border: 8px solid #f3f3f3;
                    /* Light grey */
                    border-top: 8px solid #f23b3b;
                    /* Blue */
                    border-radius: 50%;
                    width: 60px;
                    height: 60px;
                    animation: spin 2s linear infinite;
                }

                @keyframes spin {
                    0% {
                        transform: rotate(0deg);
                    }

                    100% {
                        transform: rotate(360deg);
                    }
                }
            </style>
        </div>
    </div>

</x-app-layout>
