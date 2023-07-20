<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('nav.categories') }}
        </h2>

        <x-primary-link-button  href="{{ route('categories.create') }}">
            {{ __('categories.add-category') }}
        </x-primary-link-button>
    </x-slot>

    <div class="flex gap-4 flex-col max-w-7xl mx-auto">

    </div>


</x-app-layout>
