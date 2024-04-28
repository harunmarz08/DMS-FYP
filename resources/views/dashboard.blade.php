<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div>dashboard</div>
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
                        <form action="{{ route('notifications.unread') }}" method="post">
                            @csrf
                            @method('post')
                            <button type="submit">Mark as Unread</button>
                        </form>
                        @foreach (auth()->user()->notifications as $notification)
                            <!-- Display notification data -->

                            <x-directory color="gray">

                                Notification ID: {{ $notification->id }} <br>
                                Notification Data: {{ $notification->data['task_id'] }} <br>
                                <form id="read_notification_{{ $notification->id }}"
                                    name="read_notification_{{ $notification->id }}"
                                    action="{{ route('notifications.read', ['notification' => $notification->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('post')
                                    <button type="submit">Mark as Read</button>
                                </form>
                            </x-directory>
                        @endforeach

                    </div>
                </div>
            @endauth

        </div>
    </div>
</x-app-layout>
