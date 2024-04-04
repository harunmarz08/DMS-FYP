<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Appendix') }}
        </h2>
    </x-slot>
    <div>appendix</div>
    @if (session('status') === 'task-assigned')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-800 bg-green-400 border border-green-400 rounded-md p-2">{{ __('Task Assigned.') }}
        </p>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 m-4">
                        <div class="text-xl font-bold pb-5">
                            {{ $project->name }}
                        </div>
                        <div class="flex flex-col space-y-4">
                            @foreach ($tasks as $task)
                                <x-directory color="white" class="grid grid-cols-3">
                                    <div class="">
                                        <div>{{ $task->name }}</div>
                                        <x-secondary-button class="ms-4">
                                            {{ __('Download Template') }}
                                        </x-secondary-button>
                                    </div>
                                    <div class="flex flex-row justify-center">
                                        <div class="content-center pr-2">
                                            <x-input-label for="roles" :value="__('Version')" />

                                            <select name="version-{{ $task->id }}" class="block mt-1 w-50">
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
                                        {{-- Upload --}}
                                        <div class="content-center pr-2">
                                            <x-primary-button x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'upload-document-{{ $task->id }}')">{{ __('Upload') }}
                                            </x-primary-button>

                                            <x-modal name="upload-document-{{ $task->id }}" focusable>
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
                                        {{-- Assign --}}
                                        <div class="content-center">
                                            @if ($task->user_id !=0)
                                                <x-secondary-button >Assigned</x-secondary-button>
                                            @else
                                            <x-primary-button x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'assign-document-{{ $task->id }}')">{{ __('Assign') }}
                                        </x-primary-button>
                                        <x-modal name="assign-document-{{ $task->id }}" focusable>
                                            <form method="post"
                                                action="{{ route('project.assign', ['task' => $task]) }}"
                                                class="p-6">
                                                @csrf
                                                @method('post')

                                                <h2 class="text-lg font-medium text-gray-900 py-2">
                                                    {{ __('Assign task') }}
                                                </h2>

                                                <div class="flex flex-col">
                                                    <div class="flex justify-between mb-2">
                                                        <span class="font-bold">Owner:</span>
                                                        <span class="ml-2"> foo </span>
                                                    </div>
                                                </div>
                                                <select name="user_id" class="block mt-1 w-50">
                                                    <option value="default">-- Select User --</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->email }}
                                                        </option>
                                                    @endforeach
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
                                            @endif
                                            
                                        </div>
                                    </div>
                                </x-directory>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
