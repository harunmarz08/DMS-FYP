<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Add Collaborators to Project: {{ $project->name }}</h1>

            <form method="POST" action="{{ route('project.add-collaborators', $project) }}">
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <h2 class="text-lg font-medium text-gray-900">Select Users to Add as Collaborators</h2>
                    <div class="grid grid-cols-3 gap-4">
                        @foreach ($users as $user)
                            @if ($user->role >= 0)
                                <div class="flex items-center">
                                    <input id="user-{{ $user->id }}" name="collaborators[]" type="checkbox"
                                        value="{{ $user->id }}" class="form-checkbox"
                                        {{ in_array($user->id, array_column($project->collaborators ?? [], 'id')) ? 'checked' : '' }}>
                                    <label for="user-{{ $user->id }}" class="ml-2">{{ $user->name }}
                                        ({{ $user->email }})- Role: {{ $user->role === 0 ? 'Director' : ($user->role === 1 ? 'User' : ($user->role === 2 ? 'TDA' : '')) }}
                                    </label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button onclick="window.location='{{ route('project.index') }}'">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button class="ml-3">
                        {{ __('Save Changes') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
