<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <x-nav-link2 :href="url()->route('admin.manage-users.list')">
                <svg width="12px" height="12px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                    <path fill="rgb(55 65 81)" fill-rule="evenodd"
                        d="M2.29289,7.29289 L7.29289,2.29289 C7.68342,1.90237 8.31658,1.90237 8.70711,2.29289 C9.06759,2.65337923 9.09531923,3.22060645 8.79029769,3.61290152 L8.70711,3.70711 L4.41421,8 L8.70711,12.2929 C9.09763,12.6834 9.09763,13.3166 8.70711,13.7071 C8.34662077,14.0675615 7.77939355,14.0952893 7.38709848,13.7902834 L7.29289,13.7071 L2.29289,8.70711 C1.93241,8.34662077 1.90468077,7.77939355 2.20970231,7.38709848 L2.29289,7.29289 L7.29289,2.29289 L2.29289,7.29289 Z M7.29289,7.29289 L12.2929,2.29289 C12.6834,1.90237 13.3166,1.90237 13.7071,2.29289 C14.0675615,2.65337923 14.0952893,3.22060645 13.7902834,3.61290152 L13.7071,3.70711 L9.41421,8 L13.7071,12.2929 C14.0976,12.6834 14.0976,13.3166 13.7071,13.7071 C13.3466385,14.0675615 12.7793793,14.0952893 12.3871027,13.7902834 L12.2929,13.7071 L7.29289,8.70711 C6.93241,8.34662077 6.90468077,7.77939355 7.20970231,7.38709848 L7.29289,7.29289 L12.2929,2.29289 L7.29289,7.29289 Z" />
                </svg>{{ __('Update "') }}{{ $user->name }}{{ __('" Information') }}
            </x-nav-link2>
        </h2>
    </x-slot>
    <div></div>

    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.manage-users.update', ['user' => $user]) }}" method="post">
                @csrf
                @method('patch')
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-auto" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="off" value="{{ $user->name }}" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-auto" type="email" name="email"
                        :value="old('email')" required autocomplete="off" value="{{ $user->email }}" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-auto" type="password" name="password" 
                        autocomplete="off" placeholder="Optional"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-auto" type="password"
                        name="password_confirmation"  autocomplete="off" placeholder="Re-enter password"/>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <div class="mt-4 flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
