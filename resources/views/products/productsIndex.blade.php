<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('nav.products') }}
        </h2>

        <x-primary-button>
            {{ __('products.add-product') }}
        </x-primary-button>
    </x-slot>

    <div class="flex gap-4 flex-col max-w-7xl mx-auto  ">
        @foreach ($products as $product)
                    <a href="https://google.com" class="flex flex-row bg-white shadow justify-between px-6 py-4">
                        <div class="flex justify-start align-middle w-full">{{ $product->name }}</div>

                        <div class="flex justify-center align-middle w-full">{{ $product->price }}</div>

                        <div class="flex justify-end align-middle w-full">
                            <x-primary-button>
                                {{ __('products.delete') }}
                            </x-primary-button>
                        </div>
                    </a>
        @endforeach
    </div>


</x-app-layout>
