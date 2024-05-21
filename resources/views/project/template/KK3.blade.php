<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <x-nav-link2 :href="url()->route('project.index')">
                <svg width="12px" height="12px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path fill="rgb(55 65 81)" fill-rule="evenodd"
                        d="M2.29289,7.29289 L7.29289,2.29289 C7.68342,1.90237 8.31658,1.90237 8.70711,2.29289 C9.06759,2.65337923 9.09531923,3.22060645 8.79029769,3.61290152 L8.70711,3.70711 L4.41421,8 L8.70711,12.2929 C9.09763,12.6834 9.09763,13.3166 8.70711,13.7071 C8.34662077,14.0675615 7.77939355,14.0952893 7.38709848,13.7902834 L7.29289,13.7071 L2.29289,8.70711 C1.93241,8.34662077 1.90468077,7.77939355 2.20970231,7.38709848 L2.29289,7.29289 L7.29289,2.29289 L2.29289,7.29289 Z M7.29289,7.29289 L12.2929,2.29289 C12.6834,1.90237 13.3166,1.90237 13.7071,2.29289 C14.0675615,2.65337923 14.0952893,3.22060645 13.7902834,3.61290152 L13.7071,3.70711 L9.41421,8 L13.7071,12.2929 C14.0976,12.6834 14.0976,13.3166 13.7071,13.7071 C13.3466385,14.0675615 12.7793793,14.0952893 12.3871027,13.7902834 L12.2929,13.7071 L7.29289,8.70711 C6.93241,8.34662077 6.90468077,7.77939355 7.20970231,7.38709848 L7.29289,7.29289 L12.2929,2.29289 L7.29289,7.29289 Z" />
                </svg>
                {{-- {{ session('project-name') }} --}}
                {{-- {{ $project->name }} --}}
                {{ __('KK3') }}
            </x-nav-link2>
        </h2>
    </x-slot>
    <div>appendix</div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 m-4">
                        <h2 class="text-lg font-medium text-gray-900 py-2">
                            {{ __('CADANGAN SEMAKAN KURIKULUM PROGRAM') }}
                        </h2>
                        {{-- Item 1 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="text-left col-span-2">1. UNIVERSITI AWAM</div>
                            <div class="text-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4 ">Nama Universiti</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 2 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="text-left col-span-2">2. TUJUAN</div>
                            <div class="text-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan Tujuan</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 3 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="text-left col-span-2">3. VISI, MISI & MATLAMAT PENDIDIKAN UNIVERSITI</div>
                            <div class="text-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Visi</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">Misi</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">Matlamat</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 4 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">4. BIDANG TUJAHAN UNIVERSITI</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan bidang tujahan universiti.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 5 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">5. ENTITI AKADEMIK YANG MEMOHON</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">5.1. Nyatakan nama penuh entiti akademik yang
                                    memohon semakan kurikulum.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">5.2. Nyatakan program akademik sedia ada di entiti
                                    akademik yang memohon semakan kurikulum</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 6 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">6. LOKASI PENAWARAN</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">6.1. Nyatakan lokasi program akademik yang akan
                                    dijalankan.</h1>

                                <h1 class="text-l font-semibold mb-4">6.2. Nyatakan lokasi baharu yang dicadangkan (jika
                                    berkaitan)</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">6.3. Nyatakan kelulusan Audit Lokasi (sekiranya
                                    berkaitan)</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 7 - Table --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">7. PROGRAM AKADEMIK YANG DISEMAK</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">7.1. Nama program yang disemak dalam Bahasa Melayu
                                    dan Bahasa Inggeris.</h1>
                                <h1 class="text-m font-semibold mb-4">Bahasa Melayu</h1>
                                <div class="overflow-x-auto">
                                    <table class="table-fixed border-collapse border border-gray-200 w-2/3">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-4 py-2 ">Kod</th>
                                                <th class="border border-gray-300 px-4 py-2 w-2/3">Nama Program </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><br>
                                <h1 class="text-m font-semibold mb-4">Bahasa Inggeris</h1>
                                <div class="overflow-x-auto">
                                    <table class="table-fixed border-collapse border border-gray-200 w-2/3">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-4 py-2 ">Kod</th>
                                                <th class="border border-gray-300 px-4 py-2 w-2/3">Nama Program </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><br>
                                <h1 class="text-l font-semibold mb-4">Nama penganugerahan program dalam Bahasa Melayu
                                    dan Bahasa Inggeris</h1>
                                <h1 class="text-m font-semibold mb-4">Bahasa Melayu</h1>
                                <div class="overflow-x-auto">
                                    <table class="table-fixed border-collapse border border-gray-200 w-1/3">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-4 py-2 w-1/5">Kod</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><br>
                                <h1 class="text-m font-semibold mb-4">Bahasa Inggeris</h1>
                                <div class="overflow-x-auto">
                                    <table class="table-fixed border-collapse border border-gray-200 w-1/3">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-4 py-2 w-1/5">Kod</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><br>
                            </div>
                        </x-directory>

                        {{-- Item 8 - Table --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">8. TAHAP KERANGKA KELAYAKAN MALAYSIA (MQF)</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-m font-semibold mb-4">Nyatakan tahap Kerangka kelayakan Malaysia (MQF)
                                    program yang disemak. Sila tandakan (/) </h1>
                                <div class="overflow-x-auto">
                                    <table class="table-fixed w-full border-collapse border border-gray-200 ">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-4 py-2 ">Diploma (4) </th>
                                                <th class="border border-gray-300 px-4 py-2 ">Sarjana Muda (6) </th>
                                                <th class="border border-gray-300 px-4 py-2 ">Sarjana (7) </th>
                                                <th class="border border-gray-300 px-4 py-2 ">Kedoktoran (8) </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><br>
                            </div>
                        </x-directory>

                        {{-- Item 9 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">9. NATIONAL EDUCATIONAL CODE (NEC)</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan kod bidang program akademik terebut
                                    berdasarkan manual NEC.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 10 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">10. PENGIKTIRAFAN BADAN PROFESIONAL</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan sama ada program akademik perlu
                                    diiktiraf oleh mana-mana badan profesional. </h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 11 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">11. KEPERLUAN STANDARD</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan standard program MQA yang digunapakai.
                                </h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 12 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">12. INSTITUSI/ ORGANISASI KERJASAMA</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Sekiranya ia melibatkan penawaran bersama
                                    institusi/organisasi lain, nyatakan nama institusi/organisasi dan nama program yang
                                    berkaitan di institusi/organisasi berkenaan.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">Sila lampirkan Letter of Intent (LoI)/Memorandum
                                    of Understanding (MoU)/ Memorandum of Agreement (MoA).</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 13 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">13. SESI PENGAJIAN KURIKULUM YANG DISEMAK SEMULA
                                BERKUATKUASA </div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan semester dan sesi pengajian program
                                    akademik akan dimulakan.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 14 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">14. MOD PENAWARAN</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan mod penawaran sama ada kerja kursus,
                                    penyelidikan, campuran dan mod industri.</br>

                                    Bagi mod industri, nyatakan status mod penawaran semasa sama ada diteruskan atau
                                    tidak
                                </h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 15 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">15. KREDIT BERGRADUAT</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan jumlah kredit bergraduat program
                                    akademik tersebut.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 16 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">16. KAEDAH DAN TEMPOH PENGAJIAN</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">16.1 Nyatakan kaedah pengajian sama ada secara
                                    sepenuh
                                    masa atau separuh masa.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">16.2 Nyatakan tempoh minimum dan maksimum
                                    pengajian.
                                </h1>
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
                                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                            </td>
                                            <td class="border border-gray-300 ">
                                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border border-gray-300 ">
                                                Separuh Masa
                                            </td>
                                            <td class="border border-gray-300 ">
                                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                            </td>
                                            <td class="border border-gray-300 ">
                                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h1 class="text-l font-semibold mb-4">16.3 Nyatakan dengan jelas sekiranya terdapat
                                    gabungan
                                    semester panjang dan semester pendek.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 17 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">17. KAEDAH PENYAMPAIAN PROGRAM</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">17.1. Kaedah Penyampaian (Sila tandakan (/))</h1>
                                <table class="table-fixed  border-collapse border border-gray-200 w-3/4">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="border border-gray-300 px-4 py-2 w-1/3">Kaedah Pengajian</th>
                                            <th class="border border-gray-300 px-4 py-2 ">Tempoh Minimum </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">
                                                Sepenuh Masa
                                            </td>
                                            <td class="border border-gray-300 ">
                                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">
                                                Separuh Masa
                                            </td>
                                            <td class="border border-gray-300 ">
                                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">
                                                Separuh Masa
                                            </td>
                                            <td class="border border-gray-300 ">
                                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <h1 class="text-l font-semibold mb-4">17.2. Nyatakan Pembelajaran dan Pengajaran (PdP)
                                    yang
                                    transformatif berasaskan penyampaian abad ke-21 menerusi ruang pembelajaran yang
                                    futuristik serta penggunaan teknologi digital terkini bagi mewujudkan pembelajaran
                                    imersif berdasarkan pengalaman.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 18 - List --}}
                        <x-directory color="white" class="grid grid-cols-6 gap-4 p-4" x-data="{ textareas1: [] }">
                            <div class="justify-self-left col-span-2">18. JUSTIFIKASI SEMAKAN KURIKULUM </div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan justifikasi yang merangkumi rasional
                                    berikut (mana yang berkaitan):</h1>
                                <h1 class="text-l font-semibold mb-4">18.1. Unjuran statistik keperluan pekerjaan di
                                    sektor awam dan swasta bagi tempoh 5 tahun.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.2. Jenis pekerjaan yang berkaitan dan jumlah
                                    keperluan industri. Hasil dapatan Labour Force Survey (LFS) boleh digunakan sebagai
                                    sumber rujukan.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.3. Peratus Kebolehpasaran Graduan (Graduate
                                    Employability) bagi entiti akademik dan universiti yang ingin menawarkan program
                                    akademik baharu.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.4. Faktor perkembangan dan perubahan
                                    teknologi.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.5. Perubahan standard program.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.6. Kajian pasaran.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.7. Laporan Penilai/Pemeriksa Luar.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.8. Laporan Penambahbaikan Kualiti Berterusan.
                                    (Continual Quality Improvement, CQI).</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.9. Analisis Dapatan Pemegang Taruh.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.10. Penandaarasan.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.11. Keperluan semasa dalam bidang.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.12. Amalan Pendidikan Berimpak Tinggi (High
                                    Impact Educational Practices, HEIPS).</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.13. Konsolidasi atau Segregasi.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">18.14. Lain-lain justifikasi yang berkaitan.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />

                                <!-- Additional Textareas Section -->
                                <template x-for="(textarea, index) in textareas1" :key="index">
                                    <div class="mt-4 relative">
                                        <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                        <button @click="textareas1.splice(index, 1)"
                                            class="absolute top-0 right-0 mt-2 mr-2 text-red-500">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </template>

                                <button @click="textareas1.push({})" class="mt-4 flex items-center text-green-500">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add More
                                </button>
                            </div>
                        </x-directory>

                        {{-- Item 19 - List --}}
                        <x-directory color="white" class="grid grid-cols-6" x-data="{ textareas2: [] }">
                            <div class="justify-self-left col-span-2">19. KELESTARIAN PROGRAM </div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan kelestarian program dengan memfokuskan
                                    kepada isu sejauh manakah program dijangka bertahan di pasaran</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full"
                                    name="main-textarea" />
                            </div>
                        </x-directory>

                        {{-- Item 20 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">20. OBJEKTIF PENDIDIKAN PROGRAM</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan lokasi program akademik yang akan
                                    dijalankan.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">Nyatakan lokasi baharu yang dicadangkan (jika
                                    berkaitan)</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">Nyatakan kelulusan Audit Lokasi (sekiranya
                                    berkaitan)</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 21 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">21. HASIL PEMBELAJARAN PROGRAM</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">21.1. Nyatakan lokasi program akademik yang akan
                                    dijalankan.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">21.2. Nyatakan lokasi baharu yang dicadangkan
                                    (jika
                                    berkaitan)</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">21.3. Nyatakan kelulusan Audit Lokasi (sekiranya
                                    berkaitan)</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 22 - Table --}}
                        <x-directory color="white" class="grid grid-cols-6 gap-4">
                            <div class="justify-self-start col-span-2 font-semibold">22. KOMPONEN/ MAKLUMAT YANG DIUBAH
                                DAN STRUKTUR KURIKULUM BAHARU </div>
                            <div class="justify-self-start col-span-4">
                                <h1 class="text-l font-semibold mb-4">22.1. Nyatakan perubahan komponen/maklumat
                                    program untuk kategori perubahan
                                    maklumat. Rujuk Klasifikasi Komponen Perubahan Kurikulum (QRIM). </h1>
                                <div class="overflow-x-auto">
                                    <table class="table-fixed w-full border-collapse border border-gray-200">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-4 py-2 w-1/5 text-left"
                                                    rowspan="2">
                                                    Komponen Program</th>
                                                <th class="border border-gray-300 px-4 py-2 w-1/5 text-left"
                                                    rowspan="2">
                                                    Komponen Semakan</th>
                                                <th class="border border-gray-300 px-4 py-2" colspan="2">Deskripsi
                                                    Perubahan Semakan Kurikulum</th>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <th class="border border-gray-300 px-4 py-2 text-left">Berubah</th>
                                                <th class="border border-gray-300 px-4 py-2 text-left">Tidak Berubah
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2 font-semibold">Nama
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2 text-left">Nama Program
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    {{-- add a note popup --}}
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <div name="stack-row1">
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2 font-semibold"
                                                        rowspan="2">Kod</td>
                                                    <td class="border border-gray-300 px-4 py-2 text-left">National
                                                        Education Code (NEC)</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Kod Program (dalaman)
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                </tr>
                                            </div>
                                            <div name="stack-row2">
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2 font-semibold"
                                                        rowspan="2">Lokasi / Entiti Akademik</td>
                                                    <td class="border border-gray-300 px-4 py-2 text-left">Lokasi
                                                        Penawaran</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Entiti Akademik </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
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
                                                        <x-input-label for="it22_4peo1">
                                                            1. PEO digugur DAN diganti
                                                        </x-input-label>
                                                        <x-expanding-textarea id="it22_4peo1" name="it22_4peo1"
                                                            placeholder="Type here..." class="w-full" />
                                                        <x-input-label for="it22_4peo2">
                                                            2. PEO digugurkan TANPA diganti
                                                        </x-input-label>
                                                        <x-expanding-textarea id="it22_4peo2" name="it22_4peo2"
                                                            placeholder="Type here..." class="w-full" />
                                                        <x-input-label for="it22_4peo2">
                                                            3. PEO ditambah
                                                        </x-input-label>
                                                        <x-expanding-textarea id="it22_4peo3" name="it22_4peo3"
                                                            placeholder="Type here..." class="w-full" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 ">
                                                        <x-input-label for="it22_4peo2">
                                                            1. PLO digugurkan DAN diganti
                                                        </x-input-label>
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                        <x-input-label for="it22_4peo2">
                                                            2. PLO digugurkan TANPA diganti
                                                        </x-input-label>
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                        <x-input-label for="it22_4peo2">
                                                            3. PLO ditambah
                                                        </x-input-label>
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                </tr>
                                            </div>
                                            <div name="stack-row4">
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2 font-semibold"
                                                        rowspan="5">Struktur Kurikulum</td>
                                                    <td class="border border-gray-300 px-4 py-2 text-left">a. Tempoh
                                                        Pengajian</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2 text-left">b. Kaedah
                                                        Pengajian</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2 text-left">c. Kaedah
                                                        Penyampaian</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2 text-left">d. Mod
                                                        Penawaran</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2 text-left">e. Jumlah
                                                        Jam Kredit Keseluruhan</td>
                                                    <td class="border border-gray-300 ">
                                                        <div class="flex flex-row">
                                                            <x-expanding-textarea placeholder="Type here..."
                                                                class="w-full" />
                                                            <a class="cursor-pointer" x-data=""
                                                                x-on:click.prevent="$dispatch('open-modal', 'notes5')">

                                                                <svg class="w-4 h-4" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 12h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v13a2 2 0 01-2 2z">
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
                                                                    - Kredit kursus yang berubah taraf (teras
                                                                    menjadi elektif dan sebaliknya) <br>
                                                                    - Kredit kursus sedia ada yang distruktur semula
                                                                    (perubahan melebihi 30% pada CLO - kursus dikira
                                                                    sebagai kursus baharu (melibatkan perubahan nama
                                                                    dan kod)) <br>
                                                                    - Perbezaan kredit kursus sedia ada yang
                                                                    melibatkan perubahan pada jam kredit (yang
                                                                    semestinya melibatkan perubahan kepada CLO) <br>
                                                                    Lain-lain maklumat: <br>
                                                                    - Kursus teras dan elektif sahaja yang diambil
                                                                    kira dalam pengiraan perubahan kredit. <br>
                                                                    - Pengiraan tidak melibatkan </p>
                                                            </div>
                                                        </x-modal>
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" />
                                                    </td>
                                                </tr>
                                            </div>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2 font-semibold">Maklumat
                                                    Kursus
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2 text-left">Perubahan kepada
                                                    Hasil Pembelajaran
                                                    Kursus (CLO)</td>
                                                <td class="border border-gray-300 ">
                                                    <x-input-label for="it22_4peo2">
                                                        1. CLO digugurkan DAN diganti
                                                    </x-input-label>
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                    <x-input-label for="it22_4peo2">
                                                        2. CLO digugurkan TANPA diganti
                                                    </x-input-label>
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                    <x-input-label for="it22_4peo2">
                                                        3. CLO ditambah
                                                    </x-input-label>
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                    <div class="flex flex-row">
                                                        <a class="cursor-pointer" x-data=""
                                                            x-on:click.prevent="$dispatch('open-modal', 'notes6')">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M9 12h6m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v13a2 2 0 01-2 2z">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </div>

                                                    <x-modal name="notes6" focusable>
                                                        <div class="bg-white p-6 rounded shadow-lg z-50">
                                                            <h2 class="text-xl font-semibold mb-4">Notes</h2>
                                                            <p class="">Perubahan bilangan CLO lebih daripada
                                                                30%; kursus dikira sebagai kursus baharu (selalunya
                                                                melibatkan perubahan nama dan kod)</p>
                                                        </div>
                                                    </x-modal>
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
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
                                                <th class="border border-gray-300 px-4 py-2 text-left">Kategori Kursus
                                                </th>
                                                <th class="border border-gray-300 px-4 py-2 text-left">Jumlah kredit
                                                    kursus sedia ada </th>
                                                <th class="border border-gray-300 px-4 py-2 text-left">Jumlah kredit
                                                    kursus selepas semakan kurikulum</th>
                                                <th class="border border-gray-300 px-4 py-2 text-left">Jumlah perubahan
                                                    semakan kurikulum</th>
                                                <th class="border border-gray-300 px-4 py-2 text-left">Peratus
                                                    Perubahan </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2"> 1 </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2"> N/A </td>
                                                <td class="border border-gray-300 px-4 py-2"> N/A </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2"> 2 </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2"> 3 </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
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
                                <h1 class="text-l font-semibold mb-4">22.3. Lampirkan struktur kurikulum dan pelan
                                    pengajian terkini. </h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 23 - Table --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">23. UNJURAN PELAJAR</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan unjuran, enrolmen dan keluaran pelajar
                                    dalam tempoh lima (5) tahun.</h1>
                                <div class="overflow-x-auto">
                                    <table class="table-fixed border-collapse border border-gray-200">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-4 py-2 ">Tahun</th>
                                                <th class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </th>
                                                <th class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </th>
                                                <th class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </th>
                                                <th class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </th>
                                                <th class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2"> Unjuran </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2"> Enrolmen </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2"> Keluaran </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
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
                                <h1 class="text-l font-semibold mb-4">24.1. Nyatakan syarat am, khusus dan syarat khas
                                    kemasukan/ program.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">24.2. Nyatakan keperluan kelayakan asas termasuk
                                    Band MUET</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">24.3. Nyatakan keperluan dan kemahiran prasyarat
                                    serta syarat/kelayakan lain jika diperlukan.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">24.4. Nyatakan keperluan pelajar untuk mengambil
                                    apa-apa kursus khas bagi mereka yang tidak memenuhi kriteria kemasukan, syarat am
                                    dan khusus mengikut kelulusan Senat.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">24.5. Nyatakan kategori OKU yang diterima masuk
                                    ke program ini.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 25 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">25. PERBANDINGAN PROGRAM AKADEMIK YANG DISEMAK
                                DENGAN UNIVERSITI LAIN DALAM NEGARA/ PERTINDIHAN PROGRAM</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">25.1. Nyatakan program yang sama atau hampir sama
                                    di universiti lain (awam dan swasta) dalam negara/pertindihan program.

                                </h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">25.2. Nyatakan persamaan, perbezaan dan kekuatan
                                    program akademik yang disemak dengan program universiti yang lain dalam negara yang
                                    dibandingkan.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />

                            </div>
                        </x-directory>

                        {{-- Item 26 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">26. PERBANDINGAN DENGAN PROGRAM AKADEMIK DI
                                UNIVERSITI LUAR NEGARA</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">26.1. Nyatakan program yang sama atau hamper sama
                                    yang ditawarkan oleh universiti lain di luar negara.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">26.2. Nyatakan persamaan, perbezaan dan kekuatan
                                    program akademik yang dipohon dengan program universiti yang lain dalam negara yang
                                    dibandingkan</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 27 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">27. IMPLIKASI PERJAWATAN/ FIZIKAL DAN KEWANGAN
                            </div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">27.1. Nyatakan keperluan perjawatan sama ada
                                    memadai dengan perjawatan sedia ada atau penambahan baharu dengan mengambilkira
                                    elemen sinergi.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">27.2. Nyatakan keperluan fizikal/infrastruktur
                                    sama ada memadai dengan keperluan fizikal/infrastruktur sedia ada atau penambahan
                                    baharu dengan mengambilkira elemen sinergi.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">27.3. Nyatakan implikasi kewangan yang berkaitan.
                                </h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                <h1 class="text-l font-semibold mb-4">27.4. Nyatakan sama ada implikasi yang dinyatakan
                                    menggunakan peruntukan dalaman universiti atau memerlukan peruntukan tambahan
                                    daripada kementerian.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 28 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">28. PENJUMUDAN/ PEMBEKUAN/ PELUPUSAN PROGRAM
                            </div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan program sedia ada yang telah/akan
                                    dijumudkan/dibekukan/dilupuskan.</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Item 29 -Table --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">PROGRAM AKADEMIK YANG DISEMAK</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan lokasi program akademik yang akan
                                    dijalankan.</h1>
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
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Kelulusan asal program oleh Senat
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Kelulusan asal program oleh JKPT
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Sesi program asal ditawarkan
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><br>
                            </div>
                        </x-directory>

                        {{-- Item 30 -Table --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">PROGRAM AKADEMIK YANG DISEMAK</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan lokasi program akademik yang akan
                                    dijalankan.</h1>
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
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Tarikh Semakan Kurikulum Terdahulu oleh JKPT
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Akreditasi Penuh/MQA
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Sesi program asal ditawarkan
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Mesyuarat Jawatankuasa Akademik Fakulti (JKAF)
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Mesyuarat Jawatankuasa Tetap Senat Kurikulum dan Kualiti Akademik
                                                    (JKTS KKA)
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Mesyuarat Senat
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Mesyuarat Lembaga Pengarah Universiti
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><br>
                            </div>
                        </x-directory>

                        {{-- <form action="{{ route('project.template.create-doc') }}">
                            @method('post')
                            <input type="submit" value="Test">
                        </form> --}}
                        {{-- <h1 class="text-xl font-semibold mb-4">Expanding Textarea</h1>
                        <x-expanding-textarea placeholder="Type here..." class="w-full" /> --}}

                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                    <div class="p-4 m-4">
                        <h2 class="text-lg font-medium text-gray-900 py-2">
                            {{ __('PEMBANGUNAN PROGRAM BERTERASKAN KERANGKA') }}
                        </h2>
                        {{-- Excel 1 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">1. ADAKAH PEMBANGUNAN /SEMAKAN PROGRAM INI
                                MENERAPKAN KERANGKA EXCEL?</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />

                            </div>
                        </x-directory>

                        {{-- Excel 2 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">2. APAKAH TERAS EXCEL YANG DITERAPKAN DALAM
                                PEMBANGUNAN/SEMAKAN PROGRAM INI?
                            </div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <x-expanding-textarea placeholder="Type here..." class="w-full" />
                            </div>
                        </x-directory>

                        {{-- Excel 3 - Table --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="justify-self-left col-span-2">PROGRAM AKADEMIK YANG DISEMAK</div>
                            <div class="justify-self-left col-span-4 ml-2">
                                <h1 class="text-l font-semibold mb-4">Nyatakan lokasi program akademik yang akan
                                    dijalankan.</h1>
                                <div class="overflow-x-auto">
                                    <table class="table-fixed w-full border-collapse border border-gray-200 ">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border border-gray-300 px-4 py-2 w-1/4">TERAS</th>
                                                <th class="border border-gray-300 px-4 py-2 ">TAHAP</th>
                                                <th class="border border-gray-300 px-4 py-2 ">Sila tandakan (1 sahaja)
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr >
                                                <td class="border border-gray-300 px-4 py-2" rowspan="3">
                                                    IDEAL
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Industry-Infused
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Cooperative Education
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    Apprenticeship
                                                </td>
                                                <td class="border border-gray-300 ">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><br>
                            </div>
                        </x-directory>
                    </div>
                </div>
                <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-end py-4">
                            <x-primary-button class="mx-1">Save Draft</x-primary-button>
                            <x-primary-button class="mx-1">Save Draft</x-primary-button>
                            <x-primary-button class="mx-1">Save Draft</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
