<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project') }}
        </h2>
    </x-slot>
    <div></div>
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
                    {{-- <x-text-input id="search" class="block w-auto" type="text" name="search" autofocus
                        autocomplete="off" placeholder="Search" />
                    <x-input-error :messages="$errors->get('')" class="mt-2" />
                    <x-button-link class="py-3">*Search Logo</x-button-link> --}}
                </form>
                {{-- Add new Project --}}
                @if (auth()->check() && auth()->user()->role === 0)
                    <!-- Content for users with role 0 -->
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

                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">

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
                @endif
            </div>
            {{-- @if (empty($projects))
            @else
            @endif --}}
            @foreach ($projects as $project)
                <x-directory color="white" class="grid grid-cols-3 gap-4">
                    <div class="pl-3">
                        <a href="{{ route('project.tasks.index', ['project' => $project]) }}"
                            class="text-black hover:underline">{{ $project->name }}</a>
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        <div>Date Created: <p class="m-2 px-2 bg-gray-300 text-gray-800 rounded-xl inline-block">
                                {{ $project->created_at->format('H:i d, M Y') }}</p>
                        </div>
                        <div>Status: 
                            <p class="m-2 px-2 
                                {{ $project->status == 'New' ? 'bg-gray-300 text-gray-800' : 
                                ($project->status == 'On-going' ? 'bg-yellow-300 text-gray-800' : 
                                ($project->status == 'Completed' ? 'bg-green-300 text-white' : '')) }} 
                                rounded-xl inline-block">
                                {{ $project->status }}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-row justify-end">
                        @if (auth()->check() && auth()->user()->role === 0)
                            {{-- Collaborators --}}
                            <div class="p-3" name="add-collaborator-to-project-{{ $project->id }}">
                                <a href="{{ route('project.show-add-collaborators-form', $project) }}"
                                    class="cursor-pointer">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.83333 11.8333C8.44167 11.8333 9.75 10.525 9.75 8.91667C9.75 7.30833 8.44167 6 6.83333 6C5.225 6 3.91667 7.30833 3.91667 8.91667C3.91667 10.525 5.225 11.8333 6.83333 11.8333ZM21 15.3333V12.8333H23.5V11.1667H21V8.66666H19.3333V11.1667H16.8333V12.8333H19.3333V15.3333H21ZM6.83333 13.2917C4.88333 13.2917 1 14.2667 1 16.2083V17.6667H12.6667V16.2083C12.6667 14.2667 8.78333 13.2917 6.83333 13.2917ZM6.83333 14.9583C5.34166 14.9583 3.65 15.5167 2.95 16H10.7167C10.0167 15.5167 8.325 14.9583 6.83333 14.9583ZM8.08333 8.91667C8.08333 8.225 7.525 7.66667 6.83333 7.66667C6.14167 7.66667 5.58333 8.225 5.58333 8.91667C5.58333 9.60833 6.14167 10.1667 6.83333 10.1667C7.525 10.1667 8.08333 9.60833 8.08333 8.91667ZM11 11.8333C12.6083 11.8333 13.9167 10.525 13.9167 8.91667C13.9167 7.30833 12.6083 6 11 6C10.8 6 10.6 6.01667 10.4083 6.05833C11.0417 6.84167 11.4167 7.83333 11.4167 8.91667C11.4167 10 11.025 10.9833 10.3917 11.7667C10.5917 11.8083 10.7917 11.8333 11 11.8333ZM14.3333 16.2083C14.3333 15.075 13.7667 14.1917 12.9333 13.5167C14.8 13.9083 16.8333 14.8 16.8333 16.2083V17.6667H14.3333V16.2083Z"
                                            fill="#000000" />
                                    </svg>
                                </a>
                            </div>
                            {{-- Delete Project --}}
                            <div class="p-3" name="delete-project-{{ $project->id }}">
                                <a class="cursor-pointer" x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'delete-project-{{ $project->id }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="trash" data-name="trash"
                                        fill="red  " viewBox="0 0 24 24" width="24" height="24">
                                        <path
                                            d="m13,8h-2v-1h2v1Zm-4,8c0,.551.448,1,1,1h4c.552,0,1-.449,1-1v-6h-6v6Zm15-4c0,6.617-5.383,12-12,12S0,18.617,0,12,5.383,0,12,0s12,5.383,12,12Zm-6-4h-3v-1c0-1.103-.897-2-2-2h-2c-1.103,0-2,.897-2,2v1h-3v2h1v6c0,1.654,1.346,3,3,3h4c1.654,0,3-1.346,3-3v-6h1v-2Z" />
                                    </svg>
                                </a>

                                <x-modal name="delete-project-{{ $project->id }}" focusable>
                                    <form method="post"
                                        action="{{ route('project.destroy', ['project' => $project]) }}"
                                        class="p-6">
                                        @csrf
                                        @method('delete')

                                        <h2 class="text-lg font-medium text-gray-900 py-2">
                                            {{ __('Are you sure to delete this project?') }}
                                        </h2>

                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input id="password" class="block mt-1 w-full" type="password"
                                            name="password" required autocomplete="current-password" />
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
                            <div class="p-3" name="mark-project-{{ $project->id }}">
                                {{-- @if ($project->status =) --}}
                                    
                                {{-- @else
                                    
                                @endif --}}
                                <a href="{{ route('project.mark-as-complete', ['project' => $project]) }}"
                                    onclick="return confirm('Are you sure you want to set this status to the Project?')">
                                     @if($project->status == 'On-going')
                                         <svg name="checkmark" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M2 4.5C2 3.11929 3.11929 2 4.5 2H19.5C20.8807 2 22 3.11929 22 4.5V19.5C22 20.8807 20.8807 22 19.5 22H4.5C3.11929 22 2 20.8807 2 19.5V4.5ZM18.787 9.57537C19.1767 9.18401 19.1753 8.55084 18.784 8.16116L18.0753 7.45558C17.684 7.0659 17.0508 7.06726 16.6611 7.45863L10.8895 13.2551L7.56845 9.98027C7.1752 9.59249 6.54205 9.59692 6.15427 9.99018L5.45213 10.7022C5.06436 11.0955 5.06879 11.7286 5.46204 12.1164L10.2003 16.7888C10.5922 17.1752 11.2228 17.1723 11.6111 16.7823L18.787 9.57537Z" fill="#000000"/>
                                         </svg>
                                     @elseif($project->status == 'Completed')
                                         <svg name="cross" width="22" height="22" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione-monotone" preserveAspectRatio="xMidYMid meet">
                                             <path d="M52 2H12C6.476 2 2 6.477 2 12v40c0 5.523 4.477 10 10 10h40c5.523 0 10-4.477 10-10V12c0-5.523-4.477-10-10-10zm-2.002 40.799L42.799 50L31.998 39.199L21.2 50l-7.201-7.201L24.799 32l-10.8-10.801L21.2 14l10.798 10.799L42.799 14l7.199 7.199L39.199 32l10.799 10.799z" fill="#000000"/>
                                         </svg>
                                     @endif
                                 </a>
                            </div>
                            
                        @endif
                    </div>

                </x-directory>
            @endforeach
        </div>
    </div>
</x-app-layout>
