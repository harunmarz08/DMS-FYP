<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <x-nav-link2 :href="url()->route('project.index')">
                <svg width="12px" height="12px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path fill="rgb(55 65 81)" fill-rule="evenodd"
                        d="M2.29289,7.29289 L7.29289,2.29289 C7.68342,1.90237 8.31658,1.90237 8.70711,2.29289 C9.06759,2.65337923 9.09531923,3.22060645 8.79029769,3.61290152 L8.70711,3.70711 L4.41421,8 L8.70711,12.2929 C9.09763,12.6834 9.09763,13.3166 8.70711,13.7071 C8.34662077,14.0675615 7.77939355,14.0952893 7.38709848,13.7902834 L7.29289,13.7071 L2.29289,8.70711 C1.93241,8.34662077 1.90468077,7.77939355 2.20970231,7.38709848 L2.29289,7.29289 L7.29289,2.29289 L2.29289,7.29289 Z M7.29289,7.29289 L12.2929,2.29289 C12.6834,1.90237 13.3166,1.90237 13.7071,2.29289 C14.0675615,2.65337923 14.0952893,3.22060645 13.7902834,3.61290152 L13.7071,3.70711 L9.41421,8 L13.7071,12.2929 C14.0976,12.6834 14.0976,13.3166 13.7071,13.7071 C13.3466385,14.0675615 12.7793793,14.0952893 12.3871027,13.7902834 L12.2929,13.7071 L7.29289,8.70711 C6.93241,8.34662077 6.90468077,7.77939355 7.20970231,7.38709848 L7.29289,7.29289 L12.2929,2.29289 L7.29289,7.29289 Z" />
                </svg>
                {{-- {{ session('project-name') }} --}}
                {{ $project->name }}{{ __(' Tasks') }}
            </x-nav-link2>
        </h2>
    </x-slot>
    <div>appendix</div>
    @switch(session('status'))
        @case('task-assigned')
            <div class="max-w-8xl">
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-white bg-green-400 border border-green-400 rounded-md p-2">
                    {{ __('Task Assigned.') }}
                </p>
            </div>
        @break

        @case('task-unassigned')
            <div class="max-w-8xl">
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-800 bg-gray-400 border border-gray-400 rounded-md p-2">
                    {{ __('Task Unassigned.') }}
                </p>
            </div>
        @break

        @default
            <div></div>
    @endswitch

    @switch(session('status'))
        @case('file-uploaded')
            <div class="max-w-8xl">
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-white bg-green-400 border border-green-400 rounded-md p-2">
                    {{ __('File Uploaded.') }}
                </p>
            </div>
        @break

        @case('upload-fail')
            <div class="max-w-8xl">
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-white bg-red-400 border border-red-400 rounded-md p-2">
                    {{ __('Upload Failed.') }}
                </p>
            </div>
        @break

        @default
            <div></div>
    @endswitch
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-2">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 m-4">
                        {{-- Add new Task --}}
                        <div class="flex justify-end">
                            <x-secondary-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'new-task')">{{ __('Add New') }}
                            </x-secondary-button>

                            <x-modal name="new-task" focusable>
                                <form method="post" action="{{ route('task.create', ['project' => $project]) }}"
                                    class="p-6">
                                    @csrf
                                    @method('post')

                                    <h2 class="text-lg font-medium text-gray-900 py-2">
                                        {{ __('Create Tasks') }}
                                    </h2>

                                    <x-input-label for="task_count" :value="__('How many tasks do you want to create?')" />
                                    <x-text-input id="task_count" class="block mt-1 w-auto" type="number"
                                        name="task_count" min="1" value="1" />
                                    <x-input-error :messages="$errors->get('task_count')" class="mt-2" />

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
                        <div class="text-xl font-bold pb-5">
                            {{ $project->name }}{{ __(' Appendix') }}
                        </div>
                        {{-- Task list  --}}
                        @if (count(session('tasks')) == 0){{-- if session tasks is empty --}}
                            <div class="text-center">
                                {{ __('There are no tasks') }}
                            </div>
                        @else
                            <div class="flex flex-col space-y-4">
                                @foreach (session('tasks') as $task)
                                    <x-directory color="white" class="grid grid-cols-3">
                                        <div class="flex items-center">
                                            {{-- Task Name --}}
                                            <div class="flex flex-row pr-2">
                                                <div class="content-center pr-2">{{ $task->name }}</div>
                                                <div class="content-center">
                                                    <a class="cursor-pointer" x-data=""
                                                        x-on:click.prevent="$dispatch('open-modal', 'edit-task-{{ $task->id }}')">
                                                        <?xml version="1.0" encoding="UTF-8"?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" id="Isolation_Mode"
                                                            data-name="Isolation Mode" viewBox="0 0 24 24"
                                                            width="12" height="12">
                                                            <path
                                                                d="M22.824,1.176a4.108,4.108,0,0,0-5.676,0L0,18.324V24H5.676L22.824,6.852A4.018,4.018,0,0,0,22.824,1.176ZM4.434,21H3V19.566L15.653,6.914l1.434,1.433Z" />
                                                        </svg>

                                                    </a>
                                                    <x-modal name="edit-task-{{ $task->id }}" focusable>
                                                        <form method="post"
                                                            action="{{ route('task.update', ['task' => $task, 'project' => $project]) }}"
                                                            class="p-6">
                                                            @csrf
                                                            @method('put')

                                                            <h2 class="text-lg font-medium text-gray-900 py-2">
                                                                {{ __('Change task name.') }}
                                                            </h2>

                                                            <label for="name">New Task Name:</label>
                                                            <input type="text" name="name" id="name"
                                                                required>
                                                            <br>

                                                            <div class="mt-6 flex justify-end">

                                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                                    {{ __('Cancel') }}
                                                                </x-secondary-button>

                                                                <x-primary-button class="ms-3">
                                                                    {{ __('Change') }}
                                                                </x-primary-button>
                                                            </div>
                                                        </form>
                                                    </x-modal>
                                                </div>

                                            </div>
                                            {{-- Template  --}}
                                            <div>
                                                <x-secondary-button title="Download Template">
                                                    <?xml version="1.0" encoding="UTF-8"?>
                                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                        data-name="Layer 1" viewBox="0 0 24 24" width="15"
                                                        height="15">
                                                        <path
                                                            d="M24,24H0v-2H24v2Zm-9.86-4.89l9.82-10.11h-6.95V0H7V9H.07l9.8,10.11h0c.57,.58,1.32,.89,2.12,.89h0c.8,0,1.56-.31,2.13-.89Z" />
                                                    </svg>
                                                </x-secondary-button>
                                            </div>
                                        </div>
                                        {{-- Version  --}}
                                        <div class="flex flex-row justify-center">
                                            <div class="content-center pr-2">
                                                <form class="max-w-md mx-auto">
                                                    @csrf
                                                    @method('post')
                                                    <x-input-label for="version" :value="__('Version')" class="sr-only" />
                                                    <select id="version_{{ $task->id }}"
                                                        class="block py-2.5 px-3 mx-5 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                                        <option value="default">Choose</option>
                                                        @foreach (session('documents')->where('task_id', $task->id) as $document)
                                                            <option name="version_{{ $task->id }}"
                                                                value="{{ $document->id }}">
                                                                {{ 'v_' }}{{ $document->version }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
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
                                                    <form method="post"
                                                        action="{{ route('task.upload', ['task' => $task, 'project' => $project]) }}"
                                                        class="p-6" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('post')

                                                        <h2 class="text-lg font-medium text-gray-900 py-2">
                                                            {{ __('Upload appendix?') }}
                                                        </h2>

                                                        <div>
                                                            <x-input-label for="document" :value="__('Choose a file to upload')" />
                                                            <x-text-input id="document" class="block mt-1 w-auto"
                                                                type="file" name="document"
                                                                accept=".pdf, .doc, .docx, .txt, .xlsx, .pptx" />
                                                            <x-input-error :messages="$errors->get('document')" class="mt-2" />
                                                        </div>

                                                        <div class="mt-6 flex justify-end">
                                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                                {{ __('Cancel') }}
                                                            </x-secondary-button>

                                                            <x-primary-button class="ms-3">
                                                                {{ __('Upload') }}
                                                            </x-primary-button>
                                                        </div>
                                                    </form>
                                                </x-modal>
                                            </div>
                                            {{-- Assignment --}}
                                            <div class="content-center pr-2">
                                                @if ($task->user_id != 1)
                                                    {{-- Unassign --}}
                                                    <x-secondary-button x-data=""
                                                        x-on:click.prevent="$dispatch('open-modal', 'unassign-task-{{ $task->id }}')">{{ __('Unassign') }}
                                                    </x-secondary-button>
                                                    <x-modal name="unassign-task-{{ $task->id }}" focusable>
                                                        <form
                                                            action="{{ route('task.unassign', ['task' => $task, 'project' => $project]) }}"
                                                            method="post" class="p-6">
                                                            @csrf
                                                            @method('post')

                                                            <h2 class="text-lg font-medium text-gray-900 py-2">
                                                                {{ __('Unassign this task?') }}
                                                            </h2>

                                                            <div class="mt-6 flex justify-end">
                                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                                    {{ __('Cancel') }}
                                                                </x-secondary-button>

                                                                <x-danger-button class="ms-3">
                                                                    {{ __('Unassign') }}
                                                                </x-danger-button>
                                                            </div>
                                                        </form>
                                                    </x-modal>
                                                @else
                                                    {{-- Assign --}}
                                                    <x-primary-button x-data=""
                                                        x-on:click.prevent="$dispatch('open-modal', 'assign-task-{{ $task->id }}')">{{ __('Assign') }}
                                                    </x-primary-button>
                                                    <x-modal name="assign-task-{{ $task->id }}" focusable>
                                                        <form method="post"
                                                            action="{{ route('task.assign', ['task' => $task, 'project' => $project]) }}"
                                                            class="p-6">
                                                            @csrf
                                                            @method('post')

                                                            <h2 class="text-lg font-medium text-gray-900 py-2">
                                                                {{ __('Assign task') }}
                                                            </h2>

                                                            <div class="flex flex-col">
                                                                <div class="flex justify-between mb-2">
                                                                    <span class="font-bold">Owner:</span>
                                                                    <span class="ml-2">
                                                                        {{ auth()->user()->email }}</span>
                                                                </div>
                                                                <div class="flex justify-between mb-2">
                                                                    <span class="font-bold">Project:</span>
                                                                    <span class="ml-2"> {{ $project->name }}</span>
                                                                </div>
                                                            </div>

                                                            <select name="user_id" class="block mt-1 w-50">
                                                                <option value="default">-- Select User --</option>
                                                                @foreach (session('users') as $user)
                                                                    <option name="user_id"
                                                                        value="{{ $user->id }}">
                                                                        {{ $user->email }}
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
                                            {{-- Delete Task --}}
                                            <div class="content-center">
                                                <a class="cursor-pointer" x-data=""
                                                    x-on:click.prevent="$dispatch('open-modal', 'delete-task-{{ $task->id }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" id="trash"
                                                        data-name="trash" fill="red  " viewBox="0 0 24 24"
                                                        width="20" height="20">
                                                        <path
                                                            d="m13,8h-2v-1h2v1Zm-4,8c0,.551.448,1,1,1h4c.552,0,1-.449,1-1v-6h-6v6Zm15-4c0,6.617-5.383,12-12,12S0,18.617,0,12,5.383,0,12,0s12,5.383,12,12Zm-6-4h-3v-1c0-1.103-.897-2-2-2h-2c-1.103,0-2,.897-2,2v1h-3v2h1v6c0,1.654,1.346,3,3,3h4c1.654,0,3-1.346,3-3v-6h1v-2Z" />
                                                    </svg>
                                                </a>

                                                <x-modal name="delete-task-{{ $task->id }}" focusable>
                                                    <form method="post"
                                                        action="{{ route('task.destroy', ['task' => $task, 'project' => $project]) }}"
                                                        class="p-6">
                                                        @csrf
                                                        @method('delete')

                                                        <h2 class="text-lg font-medium text-gray-900 py-2">
                                                            {{ __('Are you sure to delete this task?') }}
                                                        </h2>
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

                                        </div>
                                    </x-directory>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
