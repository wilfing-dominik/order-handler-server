<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('nav.products') }}
        </h2>

        <x-primary-link-button href="{{ route('products.create') }}">
            {{ __('products.add-product') }}
        </x-primary-link-button>
    </x-slot>

    <div class="flex gap-4 flex-col max-w-7xl mx-auto">
        @foreach ($products as $product)
                    <a href="{{ route('products.edit', ['product' => Str::ascii($product->name)]) }}" class="flex flex-row bg-white shadow justify-between px-6 py-4 rounded">
                        <div class="flex justify-start items-center w-full">{{ $product->name }}</div>

                        <div class="flex justify-center items-center w-full">{{ $product->price }}</div>

                        @if($product->category_id)
                            <div class="flex justify-center items-center w-full">{{ $product->category->name }}</div>
                        @else
                            <div class="flex justify-center items-center w-full">{{ __('products.no-category') }}</div>
                        @endif

                        <div class="flex flex-row gap-4">
                            <div class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" >
                                {{ __('products.edit') }}
                            </div>

                            {{-- <x-primary-link-button href="{{ route('products.destroy', ['product' => Str::ascii($product->id)]) }}">
                                {{ __('products.destroy') }}
                            </x-primary-link-button> --}}
                        </div>
                    </a>
        @endforeach
    </div>


</x-app-layout>
