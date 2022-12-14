<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(Auth::user()->name . "'s Dashboard") }}
        </h2>
        <!-- Authentication -->
        <form class="absolute right-0 top-0 mt-4 " method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                {{ __('Log Out') }}
            </x-jet-dropdown-link>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg text-center">


                <livewire:user.todo-list-livewire />


            </div>
        </div>
    </div>
</x-app-layout>
