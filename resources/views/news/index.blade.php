<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stock') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w">
                    <a href="/items/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">New Item</a>

                    <table class="w-full text-left">
                        <thead>
                            <tr>
                                <th class="px-6 py-3">Item Code</th>
                                <th class="px-6 py-3">Name</th>
                                <th class="px-6 py-3">Buying Price</th>
                                <th class="px-6 py-3">Selling Price</th>
                                <th class="px-6 py-3">Wholesale Price</th>
                                <th class="px-6 py-3">Dropshipping Price</th>
                                <th class="px-6 py-3">Quantity</th>
                                <th class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="px-6 py-3">{{$item->code}}</td>
                                <td class="px-6 py-3">{{$item->name}}</td>
                                <td class="px-6 py-3">{{$item->buying_price}}</td>
                                <td class="px-6 py-3">{{$item->selling_price}}</td>
                                <td class="px-6 py-3">{{$item->wholesale_price}}</td>
                                <td class="px-6 py-3">{{$item->dropshipping_price}}</td>
                                <td class="px-6 py-3">{{$item->qty}}</td>
                                <td class="px-6 py-3"><a href="/items/{{$item->id}}">Show</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
