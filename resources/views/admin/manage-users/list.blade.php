<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>

    </x-slot>
    <div>admin user list</div>
    {{-- @if (session('status') === 'user-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-800 bg-green-400 border border-green-400 rounded-md p-2">{{ __('Saved.') }}</p>
    @endif --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <div class="py-2 flex justify-end">
                    <x-button-link :href="route('admin.manage-users.partials.create-user')">Add User</x-button-link>
                </div>
                <div class="sm:col-span-2 flex justify-center overflow-x-auto">
                    <x-table.table :headers="[
                        'ID',
                        ['name' => 'Name', 'align' => 'right'],
                        'Email',
                        'Password',
                        'Created_at',
                        'Updated_at',
                    ]" class="">
                        @foreach ($users as $user)
                            <tr class="border-b">
                                <x-table.td>{{ $user->id }}</x-table.td>
                                <x-table.td>{{ $user->name }}</x-table.td>
                                <x-table.td>{{ $user->email }}</x-table.td>
                                <x-table.td>{{ $user->password }}</x-table.td>
                                <x-table.td align="right">{{ $user->created_at }}</x-table.td>
                                <x-table.td align="right">{{ $user->updated_at }}</x-table.td>
                                <x-table.td>
                                    <x-button-link :href="route('admin.manage-users.partials.edit-user', ['user' => $user])" :active="request()->routeIs('admin.manage-user.partials.edit-user')">
                                        Edit
                                    </x-button-link>
                                </x-table.td>
                                <x-table.td>
                                    <x-danger-button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-{{ $user->id }}-deletion')">{{ __('Delete Account') }}
                                    </x-danger-button>
                                    <x-modal name="confirm-user-{{ $user->id }}-deletion" :show="$errors->userDeletion->isNotEmpty()"
                                        focusable>
                                        <form method="post"
                                            action="{{ route('admin.manage-users.delete-user', ['user' => $user]) }}"
                                            class="p-6">
                                            @csrf
                                            @method('delete')
                                            <h2 class="text-lg font-medium text-gray-900">
                                                {{ __('Are you sure you want to delete ') }}{{ $user->name }}{{ __("'s") }}{{ __(' account?') }}
                                            </h2>

                                            <p class="mt-1 text-sm text-gray-600">
                                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this account.') }}
                                            </p>

                                            <div class="mt-6 flex justify-end">
                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Cancel') }}
                                                </x-secondary-button>

                                                <x-danger-button class="ms-3">
                                                    {{ __('Delete Account') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-modal>
                                </x-table.td>
                        @endforeach
                    </x-table.table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
