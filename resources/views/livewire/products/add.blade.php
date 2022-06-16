<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('List of Products') }}
            </h2>
            <div class="text-sm flex gap-5">
                {{-- <a href="">View Categories</a> --}}
                {{-- <a href="">Add Category</a> --}}
                <x-jet-nav-link href="{{ route('viewCategory') }}" :active="request()->routeIs('viewCategory')"
                    class="font-bold text-black">
                    {{ __('View Categories') }}
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('addCategory') }}" :active="request()->routeIs('addCategory')"
                    class="font-bold text-black">
                    {{ __('Add Categories') }}
                </x-jet-nav-link>

                {{-- <x-jet-nav-link href="{{ route('viewProductsVariants') }}"
                    :active="request()->routeIs('viewProductsVariants')">
                    {{ __('View Products Variants') }}
                </x-jet-nav-link> --}}

            </div>
        </div>
    </x-slot>
    <main>

        <div class="max-w-7xi mx-auto py-6 sm:px-6 lg:px-8 bg-slate-100">
            <div class="md:grid md:grid-cols-3 md:gap-6 px-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-16">
                        <h1 class="text-2xl	 font-bold text-gray-900">Add Products</h1>
                        <p class="mt-1 text-md text-justify	  text-gray-600">A product description is the
                            marketing copy that explains what a product is and why it’s worth purchasing. The
                            purpose of a product description is to supply customers with important information about
                            the features and benefits of the product so they’re compelled to buy.</p>
                    </div>
                </div>
                <from class="mt-5 md:mt-0 md:col-span-2" wire:submit.prevent="save">

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-2 gap-4 ">
                                <!-- Name -->
                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="name">
                                        Name
                                    </label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="name" type="text" name="name" wire:model="name"
                                        placeholder="Enter Product Name" autocomplete="name">
                                    @error('name')
                                    <span class="text-rose-600	">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="image">
                                        Image of product
                                    </label>

                                    @if (is_null($image) || is_object($image))
                                    <input type="file" wire:model="image" class="form-control
                                       block
                                       px-3
                                        w-full
                                        mt-2
                                        py-1.5
                                        text-base
                                        font-normal
                                        text-gray-700
                                        bg-white bg-clip-padding
                                        border border-solid border-gray-300
                                        rounded
                                        transition
                                        ease-in-out
                                        
                                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                    @error('image')
                                    <span class="text-rose-600	">{{ $message }}</span>
                                    @enderror
                                    @else
                                    <img src="{{ asset('storage/' . $image) }}" alt="product img">
                                    <button type="button" wire:click="removeProductImage()"
                                        class="p-2 rounded text-red-600 font-bold">X</button>
                                    @endif
                                </div>

                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="Description">
                                        Short Description
                                    </label>
                                    <textarea
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        name="short_description" wire:model="short_description" rows="4">
                                    </textarea>
                                    @error('short_description')
                                    <span class="text-rose-600	">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="Description">
                                        Description
                                    </label>
                                    <textarea
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        name="description" wire:model="description" rows="4">
                                       </textarea>
                                    @error('description')
                                    <span class="text-rose-600	">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="name"> Tags</label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="name" type="text" name="tags" wire:model="tags" autocomplete="name">
                                    @error('tags')
                                    <span class="text-rose-600	">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div>
                                    <label for="product_category" class="block font-bold text-lg text-gray-600">Product
                                        Category
                                    </label><br>
                                    @foreach ($categories as $category)
                                    <input type="radio" name="product_categories_id" wire:model="product_categories_id"
                                        value="{{ $category->id }}">
                                    <label for="{{ $category->id }}"> {{ $category->title }}</label><br>
                                    @endforeach

                                    @error('product_Categories_id')
                                    <span class="text-rose-600	">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mt-3 col-span-2">
                                    <label for="Product Variants"
                                        class="block py-1 font-bold text-lg text-gray-600 transition">Product
                                        Variants</label>
                                    @forelse($product_variants as $index=>$variant)
                                    <div class="flex gap-2">
                                        <input type="text" wire:model="product_variants.{{ $index }}.title"
                                            placeholder="Enter varaint Name"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block ">
                                        <input type="number" wire:model="product_variants.{{ $index }}.price"
                                            placeholder="Enter Varaint Price"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block">
                                        <input type="file" name="image" wire:model="product_variants.{{ $index }}.image"
                                            class="form-control block px-3 w-full mt-2 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                        <button type="button" wire:click="deleteVariant({{ $index }})"
                                            class="p-2 rounded text-red-600 font-bold">X</button>
                                    </div>
                                    @empty
                                    @endforelse
                                    <button wire:click="addVariant()"
                                        class="inline-block px-6 py-2.5 mt-2 bg-yellow-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out ">Add
                                        Variant</button>
                                </div>

                            </div>

                        </div>
                        <div
                            class=" justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-b1-md sm:rounded-br-md">
                            <button type="submit"
                                class=" inline-block font-bold px-6 py-2.5 bg-purple-900 text-white  text-md leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                                wire:click="save()">
                                Save
                            </button>
                        </div>
                    </div>
                    </form>
            </div>
        </div>
</div>
</main>
</div>