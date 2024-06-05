<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>

    </x-slot>
    <div></div>
    @if (session('status') === 'user-updated')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-800 bg-green-400 border border-green-400 rounded-md p-2">{{ __('User updated.') }}
        </p>
    @endif

    @if (session('status') === 'user-deleted')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-800 bg-green-400 border border-green-400 rounded-md p-2">{{ __('User deleted.') }}
        </p>
    @endif

    @if (session('status') === 'user-created')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-800 bg-green-400 border border-green-400 rounded-md p-2">{{ __('User created.') }}
        </p>
    @endif

    @if (session('status') === 'wrong-password')
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
            class="text-sm text-gray-100 bg-red-400 border border-red-400 rounded-md p-2">{{ __('Wrong Password.') }}
        </p>
    @endif

    <div class="pb-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 ">
            <div class="py-2 flex justify-between">
                <div class="py-2 ">
                </div>
                {{-- Add user --}}
                <div class="py-2">
                    <x-button-link :href="route('admin.manage-users.partials.create-user')">Add User</x-button-link>
                </div>
            </div>
                            {{-- User list --}}
            <div class="flex justify-center overflow-x-auto">
                <x-table.table :headers="[
                    'ID',
                    ['name' => 'Name', 'align' => 'left'],
                    'Email',
                    'Role',
                    ['name' => 'Created at', 'align' => 'right'],
                    ['name' => 'Updated at', 'align' => 'right'],
                ]" class="">
                    @foreach ($users as $user)
                        <tr class="border-b">
                            <x-table.td>{{ $user->id }}</x-table.td>
                            <x-table.td>{{ $user->name }}</x-table.td>
                            <x-table.td>{{ $user->email }}</x-table.td>
                            <x-table.td>
                                {{ $user->role == 0 ? 'Director' : ($user->role == -1 ? 'Default' : ($user->role == 2 ? 'TDA' : 'User')) }}
                            </x-table.td>
                            <x-table.td align="right">{{ $user->created_at }}</x-table.td>
                            <x-table.td align="right">{{ $user->updated_at }}</x-table.td>
                            {{-- Edit User --}}
                            <x-table.td align="center">
                                @if ($user->role !== -1)
                                    <x-button-link :href="route('admin.manage-users.partials.edit-user', ['user' => $user])" 
                                        :active="request()->routeIs('admin.manage-user.partials.edit-user')">
                                        Edit
                                    </x-button-link>
                                @endif
                            </x-table.td>
                            {{-- Delete User --}}
                            <x-table.td align="center">
                                @if ($user->role !== -1)
                                    <x-danger-button x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-{{ $user->id }}-deletion')">
                                        {{ __('Delete Account') }}
                                    </x-danger-button>
                                @endif
                                <x-modal name="confirm-user-{{ $user->id }}-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                    <form method="post"
                                        action="{{ route('admin.manage-users.delete-user', ['user' => $user]) }}"
                                        class="p-6">
                                        @csrf
                                        @method('delete')
                                        <h2 class="text-lg font-medium text-gray-900">
                                            {{ __('Are you sure you want to delete ') }}{{ $user->name }}{{ __("'s") }}{{ __(' account?') }}
                                        </h2>

                                        <p class="mt-1 text-sm text-gray-600">
                                            {{ __('Once this account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete this account.') }}
                                        </p>

                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input id="password" class="block mt-1 w-full" type="password"
                                            name="password" required autocomplete="current-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

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
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>
