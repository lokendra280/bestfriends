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
    <main>

        <div class="max-w-7xi mx-auto py-6 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6 px-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-16">
                        <h1 class="text-2xl	 font-bold text-gray-900">
                            @if($showEditmodal)
                            <span>Edit  Categories</span>
                        @else
                        <span>Add  Categories</span>
                        @endif
                    </h1>
                            
                        <p class="mt-1 text-md text-justify	  text-gray-600">To create a new category, click the Category
                            button. Let’s enter a name. It’s automatically populated with a relevant slug. We can add an
                            icon. We can select whether it’
                            s a top-level category or subcategory. Once you’ve done that, you can change the order in
                            which the categories will appear.
                            .</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">

                    <div>
                        @if (session()->has('message'))
                            <div class="text-emerald-600">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-2 gap-4 ">
                                <!-- Name -->
                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="name">
                                        Title
                                    </label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="name" type="text" name="title" wire:model="title" autocomplete="name">
                                        @error('title') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>


                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="email">
                                        Description</label>
                                    <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        name="description" wire:model="description" rows="4">
                                       </textarea>
                                       @error('description') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>

                                <div class="-mt-20">
                                    <label class="block font-bold text-lg text-gray-600" for="Description">
                                        Icon
                                    </label>
                                    <input type="text"
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        name="icon" wire:model="icon" rows="4" />
                                        @error('icon') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="product_category" class="block font-bold text-lg text-gray-600">Product
                                        Category
                                      </label><br>
                                      
                                    @foreach ($categories as $category)
                                        <input type="radio" name="parent_id" wire:model="parent_id"
                                            value="{{ $category->id }}">
                                        <label for="{{ $category->id }}"> {{ $category->title }}</label><br>
                                        
                                    @endforeach
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
                </div>
            </div>
        </div>
    </main>
</div>
