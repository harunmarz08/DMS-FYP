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
                <form id="multi-action-form" method="POST">
                    

                    <div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-end py-4">
                                <x-secondary-button id="save-draft" color="black"
                                    onclick="submitForm('{{ route('project.template.save-draft') }}')"
                                    class="mx-1">Save Draft</x-secondary-button>
                                <x-secondary-button color="black" class="mx-1">temop</x-secondary-button>
                                <x-secondary-button color="black" class="mx-1">temp</x-secondary-button>
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
