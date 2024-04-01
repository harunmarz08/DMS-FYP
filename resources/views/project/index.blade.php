<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project') }}
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
                    <x-button-link class="py-3">*Search Logo</x-button-link>
                </form>
                <div class="flex justify-end">
                    <x-primary-button x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'new-project')">{{ __('Add New') }}
                    </x-primary-button>

                    <x-modal name="new-project" focusable>
                        <form method="post" action="{{ route('project.store') }}" class="p-6">
                            @csrf
                            @method('post')

                            <h2 class="text-lg font-medium text-gray-900 py-2">
                                {{ __('Create a new Project') }}
                            </h2>

                            <label for="name">Project Name:</label>
                            <input type="text" name="name" id="name" required>
                            <br>

                            {{-- <label for="num_tasks">Number of Tasks:</label>
                            <input type="number" name="num_tasks" id="num_tasks" min="1" required>
                            <br>

                            <div id="taskInputs">
                                
                            </div> --}}

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>

                                <x-primary-button class="ms-3">
                                    {{ __('Create') }}
                                </x-primary-button>
                            </div>
                            {{-- <script>
                                document.getElementById('num_tasks').addEventListener('input', function() {
                                    var numTasks = parseInt(this.value);
                                    var taskInputsDiv = document.getElementById('taskInputs');
                                    taskInputsDiv.innerHTML = '';

                                    for (var i = 0; i < numTasks; i++) {
                                        var label = document.createElement('label');
                                        label.textContent = 'Task ' + (i + 1) + ' Name:';
                                        var input = document.createElement('input');
                                        input.type = 'text';
                                        input.name = 'tasks[' + i + '][name]';
                                        input.required = true;

                                        taskInputsDiv.appendChild(label);
                                        taskInputsDiv.appendChild(input);
                                        taskInputsDiv.appendChild(document.createElement('br'));
                                    }
                                });
                            </script> --}}
                        </form>
                    </x-modal>
                </div>
            </div>
            @foreach ($projects as $project)
                <x-directory color="white" class="grid grid-cols-2 gap-4">
                    <div>
                        <a href="{{ route('project.tasks',['project' => $project ]) }}" class="text-black hover:underline">{{ $project->name }}</a>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>Condition: N/A</div>
                        <div>Date Created: DD/MM/YYYY</div>
                        <div>Status: Draft</div>
                    </div>
                </x-directory>
            @endforeach
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
