<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('nav.products') }}
        </h2>
    </x-slot>

    <table>
        <thead>
            <tr>
                <th>Name</th>

                <th>Price</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>

                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
