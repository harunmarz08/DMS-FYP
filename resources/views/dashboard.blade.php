<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div></div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-4">
            @auth
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg col-span-2" style="max-height: auto;">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in as") }} {{ auth()->user()->name }}<br>
                        <h3 class="text-lg font-semibold mt-4">On-going projects</h3>
                        @foreach ($projects as $project)
                            @php
                                $user = auth()->user();
                                $isCreator = $project->user_id == $user->id;
                                $isNotCompleted = $project->status != 'Completed';
                                $isCollaborator = collect($project->collaborators)->contains('id', $user->id);
                            @endphp

                            @if ($isCreator || $isCollaborator)
                                @if ($isNotCompleted)
                                <a href="{{ route('project.tasks.index', ['project' => $project]) }}">
                                    <div class="bg-[#ffffff] border-2 overflow-hidden sm:rounded-lg mt-4 pl-3 pb-2 transition duration-300 hover:shadow-lg">
                                        <h4 class="text-md font-semibold">{{ $project->name }} -
                                            <p
                                                class="m-2 px-2 {{ $project->status == 'New' ? 'bg-gray-300 text-gray-800' : ($project->status == 'On-going' ? 'bg-yellow-300 text-gray-800' : ($project->status == 'Completed' ? 'bg-green-300 text-white' : '')) }} rounded-xl inline-block">
                                                {{ $project->status }}
                                            </p>
                                        </h4>
                                        <ul>
                                            @if ($project->latestTemplateDocument)
                                                <li>
                                                    <span>Latest: <span
                                                            class="underline">{{ $project->latestTemplateDocument->verification }}</span></span>
                                                    <span> - Status:
                                                        {{ $project->latestTemplateDocument->status ?? 'Unreviewed' }}</span>
                                                </li>
                                            @else
                                                <li>No template document available.</li>
                                            @endif
                                        </ul>
                                    </div>
                                </a>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="bg-white overflow-y-auto overflow-x-hidden shadow-sm sm:rounded-lg" style="max-height: 500px;">
                    <div class="p-6 text-gray-900 ">

                        @foreach (auth()->user()->notifications as $notification)
                            <!-- Display notification data -->

                            <x-directory :color="$notification->read_at ? 'gray' : 'white'">
                                New appendix uploaded at task {{ $notification->data['task_name'] ?? 'null' }}<br>
                                Project Name {{ $notification->data['project_name'] ?? 'null' }}<br>
                                <form id="read_notification_{{ $notification->id }}"
                                    name="read_notification_{{ $notification->id }}"
                                    action="{{ route('notifications.read', ['id' => $notification->id]) }}" method="post">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="border">Mark as Read</button>
                                </form>
                                {{-- <form id="unread_notification_{{ $notification->id }}"
                                    name="unread_notification_{{ $notification->id }}"
                                    action="{{ route('notifications.unread', ['id' => $notification->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="border">Mark as Unread</button>
                                </form> --}}
                            </x-directory>
                        @endforeach

                    </div>
                </div>
            @endauth

        </div>
    </div>
</x-app-layout>
