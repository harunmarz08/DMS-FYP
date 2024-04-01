<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Document Appendix') }}
        </h2>
    </x-slot>
    <div>appendix</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 m-4">
                        <div class="text-xl font-bold pb-5">
                            Project Name
                        </div>
                        <div class="flex flex-col space-y-4">
                            @php
                                $counter = 1;
                            @endphp
                            @for ($i = 0; $i < 1; $i++)
                                <x-directory color="white" class="grid grid-cols-3">
                                    <div class="">
                                        <div>Appendix {{ $counter++ }}:</div>
                                        <x-secondary-button class="ms-4">
                                            {{ __('Download Template') }}
                                        </x-secondary-button>
                                    </div>
                                    <div class="flex flex-row justify-center">
                                        <div class="content-center pr-2">
                                            <x-input-label for="roles" :value="__('Version')" />

                                            <select name="roles" class="block mt-1 w-50">
                                                <option value="default">-- Version ---</option>
                                                <option value="1">Option 1</option>
                                                <option value="2">Option 2</option>
                                                <option value="3">Option 3</option>
                                                <option value="4">Option 4</option>
                                            </select>
                                        </div>
                                        <div class="content-center">
                                            <x-secondary-button class="ms-4">
                                                {{ __('Download') }}
                                            </x-secondary-button>
                                        </div>
                                    </div>
                                    <div class="flex flex-row justify-end ">
                                        <div class="content-center pr-2">
                                            <x-primary-button x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'upload-document')">{{ __('Upload') }}
                                            </x-primary-button>

                                            <x-modal name="upload-document" focusable>
                                                <form method="post" action="" class="p-6">
                                                    @csrf
                                                    @method('')

                                                    <h2 class="text-lg font-medium text-gray-900 py-2">
                                                        {{ __('Upload appendix?') }}
                                                    </h2>

                                                    <div class="flex flex-col">
                                                        <div>Insert:</div>
                                                        <input type="file" />
                                                    </div>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>

                                                        <x-primary-button class="ms-3">
                                                            {{ __('Send') }}
                                                        </x-primary-button>
                                                    </div>
                                                </form>
                                            </x-modal>
                                        </div>
                                        <div class="content-center">
                                            <x-primary-button x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'assign-document')">{{ __('Assign') }}
                                            </x-primary-button>
                                            <x-modal name="assign-document" focusable>
                                                <form method="post" action="" class="p-6">
                                                    @csrf
                                                    @method('')

                                                    <h2 class="text-lg font-medium text-gray-900 py-2">
                                                        {{ __('Assign task') }}
                                                    </h2>

                                                    <div class="flex flex-col">
                                                        <div class="flex justify-between mb-2">
                                                            <span class="font-bold">Owner:</span>
                                                            <span class="ml-2">orange@example.com, </span>
                                                        </div>
                                                    </div>
                                                    <select name="roles" class="block mt-1 w-50">
                                                        <option value="default">-- User email --</option>
                                                        <option value="1">Option 1</option>
                                                        <option value="2">Option 2</option>
                                                        <option value="3">Option 3</option>
                                                        <option value="4">Option 4</option>
                                                    </select>

                                                    <div class="mt-6 flex justify-end">
                                                        <x-secondary-button x-on:click="$dispatch('close')">
                                                            {{ __('Cancel') }}
                                                        </x-secondary-button>

                                                        <x-primary-button class="ms-3">
                                                            {{ __('Send') }}
                                                        </x-primary-button>
                                                    </div>
                                                </form>
                                            </x-modal>
                                        </div>
                                    </div>
                                </x-directory>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
