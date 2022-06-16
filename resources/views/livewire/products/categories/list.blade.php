<div>
    {{-- Do your work, then step back. --}}

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

    <div class="py-12">
       
        <div class="max-w-none mx-auto sm:px-6 lg:px-8">
            <div class="sm:px-6 w-full">
                <div class="bg-white py-4 md:py-7 px-4 md:px-8 xl:px-10">
                    <div class="sm:flex items-center justify-between">
                        <div class="flex items-center">
                            <a class="rounded-full focus:outline-none focus:ring-2  focus:bg-indigo-50 focus:ring-indigo-800"
                                href=" javascript:void(0)">
                                <div class="py-2 px-8 bg-indigo-100 text-indigo-700 rounded-full">
                                    <p class="font-bold text-black">All</p>
                                </div>
                            </a>


                            {{-- <a href="{{ route('categories/trashbin') }}"
                                :active="request() - > routeIs('categories/trashbin')"
                                class="py-2 px-8 mx-4 text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 rounded-full ">
                                Trashbin
                            </a> --}}

                        </div>

                    </div>
                    <div class="mt-7 overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            @foreach ($productCategories as $productCategory)
                                <tbody>
                                    <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">

                                        <td class="">
                                            <div class="flex items-center pl-5">
                                                <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                                    {{ $productCategory->title }}</p>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M6.66669 9.33342C6.88394 9.55515 7.14325 9.73131 7.42944 9.85156C7.71562 9.97182 8.02293 10.0338 8.33335 10.0338C8.64378 10.0338 8.95108 9.97182 9.23727 9.85156C9.52345 9.73131 9.78277 9.55515 10 9.33342L12.6667 6.66676C13.1087 6.22473 13.357 5.62521 13.357 5.00009C13.357 4.37497 13.1087 3.77545 12.6667 3.33342C12.2247 2.89139 11.6251 2.64307 11 2.64307C10.3749 2.64307 9.77538 2.89139 9.33335 3.33342L9.00002 3.66676"
                                                        stroke="#3B82F6" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                    <path
                                                        d="M9.33336 6.66665C9.11611 6.44492 8.8568 6.26876 8.57061 6.14851C8.28442 6.02825 7.97712 5.96631 7.66669 5.96631C7.35627 5.96631 7.04897 6.02825 6.76278 6.14851C6.47659 6.26876 6.21728 6.44492 6.00003 6.66665L3.33336 9.33332C2.89133 9.77534 2.64301 10.3749 2.64301 11C2.64301 11.6251 2.89133 12.2246 3.33336 12.6666C3.77539 13.1087 4.37491 13.357 5.00003 13.357C5.62515 13.357 6.22467 13.1087 6.66669 12.6666L7.00003 12.3333"
                                                        stroke="#3B82F6" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                            </div>
                                        </td>
                                        <td class="pl-4">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none">
                                                    <path
                                                        d="M9.16667 2.5L16.6667 10C17.0911 10.4745 17.0911 11.1922 16.6667 11.6667L11.6667 16.6667C11.1922 17.0911 10.4745 17.0911 10 16.6667L2.5 9.16667V5.83333C2.5 3.99238 3.99238 2.5 5.83333 2.5H9.16667"
                                                        stroke="#52525B" stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <circle cx="7.50004" cy="7.49967" r="1.66667" stroke="#52525B"
                                                        stroke-width="1.25" stroke-linecap="round"
                                                        stroke-linejoin="round"></circle>
                                                </svg>
                                                <p class="text-sm leading-none text-gray-600 ml-2">
                                                    {{ $productCategory->slug }}</p>
                                            </div>
                                        </td>
                                        <td class="pl-5">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none">
                                                    <path d="M7.5 5H16.6667" stroke="#52525B" stroke-width="1.25"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M7.5 10H16.6667" stroke="#52525B" stroke-width="1.25"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M7.5 15H16.6667" stroke="#52525B" stroke-width="1.25"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M4.16669 5V5.00667" stroke="#52525B" stroke-width="1.25"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M4.16669 10V10.0067" stroke="#52525B" stroke-width="1.25"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M4.16669 15V15.0067" stroke="#52525B" stroke-width="1.25"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <p class="text-sm leading-none text-gray-600 ml-2">
                                                    {{ $productCategory->description }}</p>
                                            </div>
                                        </td>

                                        <td>

                                            {{ $productCategory->icon }}
                                        </td>
                                        {{-- <td class="pl-0">
                                            <button type="button"
                                                class="inline-block px-6 py-2.5 bg-blue-500 text-white font-medium text-xs leading-tight uppercase rounded-full  hover:bg-blue-500 hover:shadow-lg focus:bg-blue-500 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-600  transition duration-150 ease-in-out">More
                                                Detials</button>
                                        </td> --}}
                                        <td>
                                            <a href="{{route('editcategory',$productCategory->id) }}" :active="request() - > routeIs('editcategory')"
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                                Edit
                            </a>
                                            </td>

                                        <td>
                                            <button type="button"
                                                class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out"
                                                wire:click="delProduct({{ $productCategory->id }})">Delete</button>
                                        </td>

                                    </tr>


                                </tbody>
                            @endforeach
                        </table>
                        <div>
                            {{ $productCategories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</div>
