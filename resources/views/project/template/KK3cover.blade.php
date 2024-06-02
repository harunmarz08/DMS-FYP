<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <x-nav-link2 :href="url()->route('project.tasks.index', ['project' => $project])">
                <svg width="12px" height="12px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path fill="rgb(55 65 81)" fill-rule="evenodd"
                        d="M2.29289,7.29289 L7.29289,2.29289 C7.68342,1.90237 8.31658,1.90237 8.70711,2.29289 C9.06759,2.65337923 9.09531923,3.22060645 8.79029769,3.61290152 L8.70711,3.70711 L4.41421,8 L8.70711,12.2929 C9.09763,12.6834 9.09763,13.3166 8.70711,13.7071 C8.34662077,14.0675615 7.77939355,14.0952893 7.38709848,13.7902834 L7.29289,13.7071 L2.29289,8.70711 C1.93241,8.34662077 1.90468077,7.77939355 2.20970231,7.38709848 L2.29289,7.29289 L7.29289,2.29289 L2.29289,7.29289 Z M7.29289,7.29289 L12.2929,2.29289 C12.6834,1.90237 13.3166,1.90237 13.7071,2.29289 C14.0675615,2.65337923 14.0952893,3.22060645 13.7902834,3.61290152 L13.7071,3.70711 L9.41421,8 L13.7071,12.2929 C14.0976,12.6834 14.0976,13.3166 13.7071,13.7071 C13.3466385,14.0675615 12.7793793,14.0952893 12.3871027,13.7902834 L12.2929,13.7071 L7.29289,8.70711 C6.93241,8.34662077 6.90468077,7.77939355 7.20970231,7.38709848 L7.29289,7.29289 L12.2929,2.29289 L7.29289,7.29289 Z" />
                </svg>
                {{-- {{ session('project-name') }} --}}
                {{-- {{ $project->name }} --}}

                {{ __('KK3 Cover Page and Contact Info') }}
            </x-nav-link2>
        </h2>
    </x-slot>
    <div>
        
    </div>
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
                    @csrf
                    @method('post')
                    <div class="p-4 m-4">
                        <h2 class="text-lg font-medium text-gray-900 py-2">
                            {{ __('CADANGAN SEMAKAN KURIKULUM PROGRAM') }}
                        </h2>
                        {{-- Item 1 --}}
                        <x-directory color="white" class="grid grid-cols-2">
                            <div class="text-left ml-2">
                                <h1 class="text-l font-semibold mb-4 ">Jenis Mesyuarat &#40;Cth: JAWATANKUASA KURIKULUM
                                    UNIVERSITI&#41;</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full uppercase"
                                    :numCols='50' name="cover" :value="strtoupper($template_contents->data1['cover'])" :disabled="auth()->user()->role == 2"/>
                            </div>
                            <div class="text-left mx-2">
                                <h1 class="text-l font-semibold mb-4 ">Nama Program &#40;Cth: SECJH etc.&#41;</h1>
                                <x-expanding-textarea placeholder="Type here..." class="w-full uppercase"
                                    :numCols='50' name="nama_program" :value="strtoupper($template_contents->data1['nama_program'])" :disabled="auth()->user()->role == 2"/>
                            </div>
                        </x-directory>

                        {{-- Item 2 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="col-span-6">
                                <div class="flex justify-center">
                                    <div class="text-center ml-2">
                                        <h1 class="text-l font-semibold mb-4">MAKLUMAT KAKITANGAN</h1>
                                        <table class="table-fixed border-collapse border  border-gray-200 ">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2"></th>
                                                    <th class="border border-gray-300 px-4 py-2 ">Disediakan oleh</th>
                                                    <th class="border border-gray-300 px-4 py-2">Disemak oleh</th>
                                                    <th class="border border-gray-300 px-4 py-2">Disahkan oleh</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Tandatangan</td>
                                                    <td class="border border-gray-300 px-4 py-2" colspan="3">To be
                                                        filled on the completed document</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">
                                                        Nama
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            :numCols='30' name="nama1" :value="$template_contents->data1['nama1']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            :numCols='30' name="nama2" :value="$template_contents->data1['nama2']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            :numCols='30' name="nama3" :value="$template_contents->data1['nama3']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">
                                                        Jawatan
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            :numCols='30' name="jawatan1" :value="$template_contents->data1['jawatan1']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            :numCols='30' name="jawatan2" :value="$template_contents->data1['jawatan2']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            :numCols='30' name="jawatan3" :value="$template_contents->data1['jawatan3']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">
                                                        Tarikh
                                                    </td>
                                                    <td class="border border-gray-300 px-4 py-2" colspan="3">
                                                        To be filled on the completed document
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </x-directory>

                        {{-- Item 3 --}}
                        <x-directory color="white" class="grid grid-cols-6">
                            <div class="col-span-6">
                                <div class="flex justify-center">
                                    <div class="text-center ml-2">
                                        <h1 class="text-l font-semibold mb-4">MAKLUMAT PEGAWAI PENYEDIA DOKUMEN UNTUK
                                            DIHUBUNGI</h1>
                                        <table class="table-fixed border-collapse border  border-gray-200 ">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2">MAKLUMAT</th>
                                                    <th class="border border-gray-300 px-4 py-2 ">URUS SETIA UA</th>
                                                    <th class="border border-gray-300 px-4 py-2">ENTITI AKADEMIK YANG
                                                        MEMOHON</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">
                                                        Nama
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            :numCols='30' name="c_pp_name" :value="$template_contents->data1['c_pp_name']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            :numCols='30' name="c_dk_name" :value="$template_contents->data1['c_dk_name']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">
                                                        Jawatan
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            :numCols='30' name="c_pp_jawatan" :value="$template_contents->data1['c_pp_jawatan']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            :numCols='30' name="c_dk_jawatan" :value="$template_contents->data1['c_dk_jawatan']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">
                                                        No. Tel Pejabat
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" :numCols='30' name="c_pp_off"
                                                            :value="$template_contents->data1['c_pp_off']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" :numCols='50' name="c_dk_off"
                                                            :value="$template_contents->data1['c_dk_off']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">
                                                        No. Tel Bimbit
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" :numCols='30' name="c_pp_ph"
                                                            :value="$template_contents->data1['c_pp_ph']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" :numCols='50' name="c_dk_ph"
                                                            :value="$template_contents->data1['c_dk_ph']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">
                                                        E-mel
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" :numCols='30' name="c_pp_mail"
                                                            :value="$template_contents->data1['c_pp_mail']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                    <td class="border border-gray-300">
                                                        <x-expanding-textarea placeholder="Type here..."
                                                            class="w-full" :numCols='50' name="c_dk_mail"
                                                            :value="$template_contents->data1['c_dk_mail']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </x-directory>
                        <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                                <div class="flex justify-end py-4">
                                    @if(auth()->user()->role != 2)
                                        <div class="flex justify-end py-4">
                                            <x-secondary-button id="save-draft" color="black"
                                                onclick="submitForm('{{ route('project.template.save-draft-cover', ['project' => $project]) }}')"
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
