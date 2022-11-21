<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg text-center">

                @if (Auth::user()->LicenseId == 10000)
                    {{-- role:user --}}
                    <script>
                        window.location = "{{ route('user.homepage') }}";
                    </script>
                @elseif(Auth::user()->LicenseId == 20000)
                    {{-- role:admin --}}
                    <script>
                        window.location = "{{ route('admin.homepage') }}";
                    </script>
                @else
                    You're not authorized.
                @endif


            </div>
        </div>
    </div>
</x-app-layout>
