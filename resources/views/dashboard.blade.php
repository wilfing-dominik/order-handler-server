<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('nav.dashboard') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-6 text-gray-900 flex gap-6 flex-col">
            @foreach ($tables as $table)
                <a id="{{ $table->id }}" class="bg-white p-6 rounded tableCard" style="cursor: pointer">
                    {{ $table->name }}
                </a>
            @endforeach
        </div>
    </div>

    @section('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                let tables = document.querySelectorAll(".tableCard")
                tables.forEach(table => {
                    table.addEventListener('click', () => {
                        let id = table.id
                        axios.get('/orders/'+ id)
                            .then(function (response) {
                                console.log(response.data);
                            })
                            .catch(function (error) {
                                console.error(error);
                        });
                    })
                });
            })
        </script>
    @endsection

</x-app-layout>
