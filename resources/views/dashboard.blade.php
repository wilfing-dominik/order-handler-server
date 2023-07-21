<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('nav.dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-row gap-4" style="height: 75vh">
        <div class="flex flex-wrap justify-center gap-4 w-7/12 items-start pt-10">
            @foreach ($tables as $table)
                <a id="{{ $table->id }}" class="tableCard flex justify-center items-center bg-white w-52 h-28 flex-col rounded cursor-pointer shadow-sm">
                    <div>{{ $table->name }}</div>
                    <div>1350 Ft</div>
                </a>
            @endforeach
        </div>

        <div class="flex flex-col gap-4 w-5/12 h-full">
            <div class="h-full">
                <p class="text-xl font-semibold pb-3">Rendelések</p>
                <div class="orderContainer bg-white shadow-sm p-4 rounded-sm h-full">
                    Kattintson egy asztalra a rendelések megjelenítéséhez!
                </div>
            </div>

            {{-- <div class="">
                <p class="text-xl font-semibold">Terméklista</p>
                <div class="productContainer bg-white shadow-sm p-4 rounded-sm">
                </div>
            </div> --}}
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
                            const orderContainer = document.querySelector(".orderContainer")

                            while (orderContainer.firstChild) {
                                orderContainer.removeChild(orderContainer.firstChild);
                            }

                            if (response.data.length === 0) {
                                const paragraph = document.createElement('p');
                                paragraph.textContent = `Ehhez az asztalhoz nem tartoznak rendelések`;
                                orderContainer.appendChild(paragraph);
                            }

                            for (let i = 0; i < response.data.length; i++) {
                                const paragraph = document.createElement('p');
                                paragraph.textContent = `${response.data[i].product.name}`;
                                orderContainer.appendChild(paragraph);
                            }
                        })
                        .catch(function (error) {
                            const paragraph = document.createElement('p');
                            paragraph.textContent = `Hiba az adat lekérésekor`;
                            orderContainer.appendChild(paragraph);
                        });
                    })
                });

                // FETCH PRODUCT LIST
                // axios.get('/get-products')
                // .then(function (response) {
                //     const productContainer = document.querySelector(".productContainer")
                //     for (let i = 0; i < response.data.length; i++) {
                //         const name = document.createElement('p');
                //         name.textContent = `${response.data[i].name}`;
                //         productContainer.appendChild(name);

                //         const price = document.createElement('p');
                //         price.textContent = `${response.data[i].price}`;
                //         productContainer.appendChild(price);
                //     }
                // })
                // .catch(function (error) {
                //     const productContainer = document.querySelector(".productContainer")
                //     const paragraph = document.createElement('p');
                //     paragraph.textContent = `Hiba az adat lekérésekor`;
                //     productContainer.appendChild(paragraph);
                // });
            })
        </script>
    @endsection
</x-app-layout>
