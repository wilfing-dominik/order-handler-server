<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('nav.dashboard') }}
        </h2>
    </x-slot>

    <div class="flex flex-row">
        <div class="flex gap-4">
            @foreach ($tables as $table)
                <a id="{{ $table->id }}" class="tableCard bg-white p-3">
                    <div>{{ $table->name }}</div>
                    <div>1350 Ft</div>
                </a>
            @endforeach
        </div>

        <div class="">
            <div class="orderContainer">
                Kattintson egy asztalra a rendelések megjelenítéséhez!
            </div>

            <div class="productContainer">
            </div>
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

                axios.get('/get-products')
                .then(function (response) {
                    const productContainer = document.querySelector(".productContainer")
                    for (let i = 0; i < response.data.length; i++) {
                        const name = document.createElement('p');
                        name.textContent = `${response.data[i].name}`;
                        productContainer.appendChild(name);

                        const price = document.createElement('p');
                        price.textContent = `${response.data[i].price}`;
                        productContainer.appendChild(price);
                    }
                })
                .catch(function (error) {
                    const productContainer = document.querySelector(".productContainer")
                    const paragraph = document.createElement('p');
                    paragraph.textContent = `Hiba az adat lekérésekor`;
                    productContainer.appendChild(paragraph);
                });
            })
        </script>
    @endsection

</x-app-layout>
