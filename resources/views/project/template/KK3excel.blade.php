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
                {{ __('KK3 Excel') }}
            </x-nav-link2>
        </h2>
    </x-slot>
    <div class="">
        
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
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                        
                        <div class="p-4 m-4">
                            <h2 class="text-lg font-medium text-gray-900 py-2">
                                {{ __('PEMBANGUNAN PROGRAM BERTERASKAN KERANGKA EXCEL') }}
                            </h2>
                            {{-- Excel 1 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">1. ADAKAH PEMBANGUNAN /SEMAKAN PROGRAM INI MENERAPKAN KERANGKA EXCEL?</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it_excel1" :value="$template_contents->data4['it_excel1']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Excel 2 --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">2. APAKAH TERAS EXCEL YANG DITERAPKAN DALAM PEMBANGUNAN/SEMAKAN PROGRAM INI?</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it_excel2" :value="$template_contents->data4['it_excel2']" :disabled="auth()->user()->role == 2"/>
                                </div>
                            </x-directory>

                            {{-- Excel 3 - Table --}}
                            <x-directory color="white" class="grid grid-cols-6">
                                <div class="justify-self-left col-span-2">3. SILA NYATAKAN TAHAP TERAS EXCEL SEPERTI YANG DINYATAKAN DI PERKARA &#40;2&#41; BERSERTA JUSTIFIKASI</div>
                                <div class="justify-self-left col-span-4 ml-2">
                                    <h1 class="text-l font-semibold mb-4">Nyatakan lokasi program akademik yang akan dijalankan.</h1>
                                    <div class="overflow-x-auto">
                                        <table class="table-fixed w-full border-collapse border border-gray-200 ">
                                            <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="border border-gray-300 px-4 py-2 w-1/4">TERAS</th>
                                                    <th class="border border-gray-300 px-4 py-2 ">TAHAP</th>
                                                    <th class="border border-gray-300 px-4 py-2 ">Sila tandakan &#40;1
                                                        sahaja&#41;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2" rowspan="4">IDEAL
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Industry-Infused</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            name="it_excel3cb1" :value="$template_contents->data4['it_excel3cb1']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Cooperative Education
                                                    </td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            name="it_excel3cb2" :value="$template_contents->data4['it_excel3cb2']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-300 px-4 py-2">Apprenticeship</td>
                                                    <td class="border border-gray-300 ">
                                                        <x-expanding-textarea placeholder="Type here..." class="w-full"
                                                            name="it_excel3cb3" :value="$template_contents->data4['it_excel3cb3']" :disabled="auth()->user()->role == 2"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div><br>
                                    <h1 class="text-l font-semibold mb-4">Nyatakan nama kursus yang terlibat dalam Kerangka EXCEL.</h1>

                                    <div id="inputContainer">
                                        <!-- Display existing data5['it_excelex'] fields -->
                                        @if(isset($template_contents->data5['it_excelex']))
                                            @foreach($template_contents->data5['it_excelex'] as $index => $value)
                                                <div class="input-group" id="input-group-{{ $index }}">
                                                    <x-expanding-textarea placeholder="Type here..." class="w-full" name="it_excelex[{{ $index }}]" :value="$value" :disabled="auth()->user()->role == 2"/>
                                                    <button type="button" class="remove-btn" onclick="removeInput({{ $index }})" {{ auth()->user()->role == 2 ? 'disabled' : '' }}>Remove</button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="button" class="btn" id="add2">Add</button>
                                    
                                    <script>
                                        var i = {{ isset($template_contents->data5['it_excelex']) ? count($template_contents->data5['it_excelex']) : 0 }};
                                    
                                        document.getElementById('add2').addEventListener('click', function () {
                                            var container = document.createElement('div');
                                            container.className = 'input-group';
                                            container.id = 'input-group-' + i;
                                            container.innerHTML = `
                                                <x-expanding-textarea placeholder="Type here..." class="w-full" name="it_excelex[${i}]" />
                                                <button type="button" class="remove-btn" onclick="removeInput(${i})" {{ auth()->user()->role == 2 ? 'disabled' : '' }}>Remove</button>
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

                                    <h1 class="text-l font-semibold mb-4">Justifikasi:</h1>
                                    <div class="justify-self-left col-span-4 ml-2">
                                        <x-expanding-textarea placeholder="Type here..." class="w-full" name="it_excelj" :value="$template_contents->data4['it_excelj']" :disabled="auth()->user()->role == 2"/>
                                    </div>
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
                                            onclick="submitForm('{{ route('project.template.save-draft-excel', ['project' => $project]) }}')"
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
