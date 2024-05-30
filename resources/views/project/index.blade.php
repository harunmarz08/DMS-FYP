<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project') }}
        </h2>
    </x-slot>
    <div>index</div>
    @switch(session('status'))
        @case('wrong-password')
            <div class="max-w-8xl ">
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-white bg-red-400 border border-red-400 rounded-md p-2">
                    {{ __('Wrong Password') }}
                </p>
            </div>
        @break

        @case('project-deleted')
            <div class="max-w-8xl">
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-white bg-green-400 border border-green-400 rounded-md p-2">
                    {{ __('Project Deleted.') }}
                </p>
            </div>
        @break

        @default
            <div></div>
    @endswitch
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2 grid grid-cols-2">
                {{-- Search --}}
                <form action="#" method="post" class="flex items-center">
                    <x-text-input id="search" class="block w-auto" type="text" name="search" autofocus
                        autocomplete="off" placeholder="Search" />
                    <x-input-error :messages="$errors->get('')" class="mt-2" />
                    <x-button-link class="py-3">*Search Logo</x-button-link>
                </form>
                {{-- Add new Project --}}
                <div class="flex justify-end">
                    <x-primary-button x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'new-project')">{{ __('Add New') }}
                    </x-primary-button>

                    <x-modal name="new-project" focusable>
                        <form method="post" action="{{ route('project.create') }}" class="p-6">
                            @csrf
                            @method('post')

                            <h2 class="text-lg font-medium text-gray-900 py-2">
                                {{ __('Create a new Project') }}
                            </h2>

                            <label for="name">Project Name:</label>
                            <input type="text" name="name" id="name" required>
                            <br>

                            <input type="hidden" name="created_by" value="{{ auth()->id() }}">

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                                <x-primary-button class="ms-3">
                                    {{ __('Create') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </x-modal>
                </div>
            </div>
            @if (empty($projects))
                
            @else
                
            @endif
            @foreach ($projects as $project)
                <x-directory color="white" class="grid grid-cols-3 gap-4">
                    <div class="pl-3">
                        <a href="{{ route('project.tasks.index', ['project' => $project]) }}"
                            class="text-black hover:underline">{{ $project->name }}</a>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>Condition: N/A</div>
                        <div>Date Created: DD/MM/YYYY</div>
                        <div>Status: Draft</div>
                    </div>
                    <div class="flex justify-end">
                        <a class="cursor-pointer" x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'delete-project-{{ $project->id }}')">
                            <svg xmlns="http://www.w3.org/2000/svg" id="trash" data-name="trash" fill="red  "
                                viewBox="0 0 24 24" width="20" height="20">
                                <path
                                    d="m13,8h-2v-1h2v1Zm-4,8c0,.551.448,1,1,1h4c.552,0,1-.449,1-1v-6h-6v6Zm15-4c0,6.617-5.383,12-12,12S0,18.617,0,12,5.383,0,12,0s12,5.383,12,12Zm-6-4h-3v-1c0-1.103-.897-2-2-2h-2c-1.103,0-2,.897-2,2v1h-3v2h1v6c0,1.654,1.346,3,3,3h4c1.654,0,3-1.346,3-3v-6h1v-2Z" />
                            </svg>
                        </a>

                        <x-modal name="delete-project-{{ $project->id }}" focusable>
                            <form method="post" action="{{ route('project.destroy', ['project' => $project]) }}"
                                class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900 py-2">
                                    {{ __('Are you sure to delete this project?') }}
                                </h2>

                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                <div class="mt-6 flex justify-end">

                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                    <x-primary-button class="ms-3">
                                        {{ __('Delete') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-modal>
                    </div>

                </x-directory>
            @endforeach
        </div>
    </div>
</x-app-layout>
