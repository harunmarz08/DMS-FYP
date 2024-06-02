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
