<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List of Products') }}
            </h2>
            <div class="text-sm flex gap-5">
                {{-- <a href="">View Categories</a> --}}
                {{-- <a href="">Add Category</a> --}}
                <x-jet-nav-link href="{{ route('viewCategory') }}" :active="request()->routeIs('viewCategory')">
                    {{ __('View Categories') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('addCategory') }}" :active="request()->routeIs('addCategory')">
                    {{ __('Add Categories') }}
                </x-jet-nav-link>

                {{-- <x-jet-nav-link href="{{ route('viewProductsVariants') }}" :active="request()->routeIs('viewProductsVariants')">
                {{ __('View Products Variants') }}
                </x-jet-nav-link> --}}

            </div>
        </div>
    </x-slot>
    <div>

        <div class="py-12">



            <div class="max-w-none mx-auto sm:px-6 lg:px-8">
                <div class="sm:px-6 w-full">
                    <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                        <div class="sm:flex items-center justify-between">
                            <div class="flex items-center">
                                <a>
                                    <div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
                                        <p class="font-bold">All</p>
                                    </div>
                                </a>


                                <a href="{{ route('trashbin') }}" :active="request() - > routeIs('trashbin')"
                                    class="py-2 px-8 mx-4 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                    Trashbin
                                </a>


                            </div>


                            <a href="{{ route('addproducts') }}" :active="request() - > routeIs('addproducts')"
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                Add Product
                            </a>

                        </div>
                        <div class="mt-7 overflow-x-auto">
                            <table class="w-full whitespace-nowrap">
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">

                                            <td class="">
                                                <div class="flex items-center pl-5">
                                                    <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                                        {{ $product->name }}
                                                    </p>

                                                </div>
                                            </td>
                                            <td class="pl-4">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <p class="text-sm leading-none text-gray-600 ml-2">
                                                        {{ $product->tags }}
                                                    </p>
                                                </div>
                                            </td>

                                            <td class="pl-4">
                                                <div class="w-20 rounded">
                                                    @if($product->image()->first())
                                                        <img src="{{ asset('storage/' . $product->image()->first()->src) }}" alt="product image">
                                                    @endif
                                                </div>
                                            </td>

                                            <td class="pl-5">
                                                <div class="flex items-center">

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5  "
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>

                                                    <p class="text-sm leading-none text-gray-600 ml-2 ">
                                                        {{ $product->created_at }}
                                                    </p>
                                                </div>
                                            </td>

                                            <td class=" text-center text-slate-500 ">

                                                {{ $product->short_description }}
                                            </td>

                                            <td>
                                                <a href="{{ route('editproducts', $product->id) }}"
                                                    :active="request() - > routeIs('editproducts')"
                                                    class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                                    Edit
                                                </a>
                                            </td>

                                            <td>
                                                <button type="button"
                                                    class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                    wire:click="delProduct({{ $product->id }})">Delete</button>
                                            </td>

                                        </tr>
                                        <tr class="h-3"></tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div>
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
