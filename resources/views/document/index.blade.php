<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Document') }}
        </h2>
    </x-slot>
    <div>index</div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2 grid grid-cols-2">
                <form action="#" method="post" class="flex items-center">
                    <x-text-input id="search" class="block w-auto" type="text" name="search" autofocus
                        autocomplete="off" placeholder="Search" />
                    <x-input-error :messages="$errors->get('')" class="mt-2" />
                    <x-button-link class="py-3">a</x-button-link>
                </form>
                <div class="flex justify-end">
                    <x-primary-button class="px-4 py-2">Add New</x-primary-button>
                </div>
            </div>
            <x-directory color="white" class="grid grid-cols-2 gap-4">
                <div>
                    <a href="{{ route('document.document-appendix') }}" class="text-black hover:underline">Project Name</a>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>Condition: N/A</div>
                    <div>Date Created: DD/MM/YYYY</div>
                    <div>Status: Draft</div>
                </div>
            </x-directory>
            {{-- <x-directory color="green" class="grid grid-cols-2 gap-4">
                <div>
                    <a href="#" class="text-white hover:underline">document Name</a>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>Condition: Approved by Authority Name</div>
                    <div>Date Created: DD/MM/YYYY</div>
                    <div>Status: Reviewed by ...</div>
                </div>
            </x-directory>
            <x-directory color="yellow" class="grid grid-cols-2 gap-4">
                <div>
                    <a href="{{ route('document.document-review') }}" class="text-white hover:underline">Reviewer Perspective</a>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>Condition: Awaiting Approval</div>
                    <div>Date Created: DD/MM/YYYY</div>
                    <div>Status: Pending</div>
                </div>
            </x-directory> --}}
        </div>
    </div>
</x-app-layout>
