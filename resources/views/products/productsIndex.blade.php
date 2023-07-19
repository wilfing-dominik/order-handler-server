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
                    <div class="flex flex-row bg-white shadow justify-between px-6 py-4 rounded">
                        <div class="flex justify-start items-center w-full">{{ $product->name }}</div>

                        <div class="flex justify-center items-center w-full">{{ $product->price }}</div>

                        @if($product->category_id)
                            <div class="flex justify-center items-center w-full">{{ $product->category->name }}</div>
                        @else
                            <div class="flex justify-center items-center w-full">{{ __('products.no-category') }}</div>
                        @endif

                        <div class="flex flex-row gap-4">
                            <x-primary-link-button  href="{{ route('products.edit', ['product' => Str::ascii($product->name)]) }}" >
                                {{ __('products.edit') }}
                            </x-primary-link-button>

                            {{-- <x-primary-link-button href="{{ route('products.destroy', ['product' => Str::ascii($product->id)]) }}">
                                {{ __('products.destroy') }}
                            </x-primary-link-button> --}}
                        </div>
                    </div>
        @endforeach
    </div>


</x-app-layout>
