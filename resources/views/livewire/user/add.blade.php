<div>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             <form enctype="multipart/form-data">
                <input class="form-control px-3 py-1.5 text-base font-normal text-gray-700bg-white bg-clip-padding border border-solid border-gray-300 rounded  transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="formFile" wire:model="excel_file">
                <button type="submit" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out" wire:model="save()">Submit</button>
             </form>
            </h2>
            <div class="text-sm flex gap-5">
            </div>
        </div>
    </x-slot>
    <main>
        <div class="max-w-7xi mx-auto py-6 sm:px-6 lg:px-8">
            <div class="md:grid md:grid-cols-3 md:gap-6 px-6">
                <div class="md:col-span-1 flex justify-between">
                    <div class="px-4 sm:px-16">
                        <h1 class="text-2xl	 font-bold text-gray-900">Add New User</h1>
                        <p class="mt-1 text-md text-justify	  text-gray-600">To create a new category, click
                            theCategorybutton. Let’s enter a name. It’s automatically populated with a relevant slug. We
                            can add anicon. We can select whether it’s a top-level category or subcategory. Once you’ve
                            done that, you can change the order in.</p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="w-full">
                        @if (session()->has('message'))
                        <div class="text-emerald-600">
                            {{ session('message') }}
                        </div>
                        @endif
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <div class="grid grid-cols-2 gap-4 ">
                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="name">Name</label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="name" type="text" name="name" wire:model="name"
                                        autocomplete="name">@error('name') <span class="text-red-600">{{ $message
                                        }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="email">Email</label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="name" type="text" name="email" wire:model="email" autocomplete="email">
                                    @error('email') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="pasword"> Password</label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="pasword" type="password" name="password" wire:model="password"
                                        autocomplete="name">
                                    @error('password') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="phonenumber">Phone
                                        Number</label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="phonenumber" type="number" name="phonenumber" wire:model="phone"
                                        autocomplete="name">
                                    @error('phonenumber') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="gender" name="gender">
                                        Gender
                                    </label>

                                    <input type="radio" id="male" wire:model="gender" name="gender" value="M" />
                                      <label for="male">Male</label>


                                    <input type="radio" id="female" wire:model="gender" name="gender" value="F" />
                                    <label for="female">Female</label>

                                    <input type="radio" id="others" wire:model="gender" name="gender" value="O" />
                                    <label for="others">Others</label>
                                </div>
                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="name">
                                        Death Of Birth
                                    </label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="dob" datepicker type="date" name="date_of_birth" wire:model="date_of_birth"
                                        data-mdb-toggle="datepicker" autocomplete="name">
                                    @error('date_of_birth') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label class="block font-bold text-lg text-gray-600" for="name">
                                        Death Of Death
                                    </label>
                                    <input
                                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"
                                        id="name" type="date" name="date_of_death" wire:model="date_of_death"
                                        data-mdb-toggle="datepicker" autocomplete="name">
                                    @error('title') <span class="text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="product_category" class="block font-bold text-lg text-gray-600">Area Id
                                    </label><br>
                                    @foreach ($area as $area)
                                    <input type="radio" name="area_id" wire:model="area_id" value="{{ $area->id }}">
                                    <label for="{{ $area->id }}"> {{ $area->name }}</label><br>
                                    @endforeach
                                </div>
                                <div class="mt-3 col-span-2">
                                    <label for="Product Variants"
                                        class="block py-1 font-bold text-lg text-gray-600 transition">Add New
                                        RelationShip</label>
                                    @forelse($new_relation as $index=>$relation)
                                    <div class="grid grid-cols-3 w-full py-4">
                                        <div>
                                            <input type="text" wire:model="new_relation.{{ $index }}.relationship"
                                                placeholder="relationship"
                                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block">
                                        </div>
                                        <div>
                                            <input type="text" wire:model="new_relation.{{ $index }}.name"
                                                placeholder="Name"
                                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block">
                                        </div>
                                        <div>
                                            <input type="text" wire:model="new_relation.{{ $index }}.email"
                                                placeholder="Email"
                                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block">
                                        </div>
                                        <div>
                                            <input type="text" wire:model="new_relation.{{ $index }}.gender"
                                                placeholder="gender"
                                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block">
                                        </div>
                                        <div>
                                            <input type="text" wire:model="new_relation.{{ $index }}.phone"
                                                placeholder="phone"
                                                class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block">
                                        </div>
                                        <button type="button" wire:click="deleterelation({{$index}})"
                                            class="pr-16 rounded text-red-600 text-2xl mt-4 font-bold">X</button>
                                    </div>
                                    @empty
                                    No relation
                                    @endforelse
                                    <button wire:click="addrelation()"
                                        class="inline-block px-6 py-2.5 mt-2 bg-yellow-600 text-white font-bold text-xs leading-tight uppercase rounded shadow-md  hover:shadow-lg focus:bg-yellow-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-700 active:shadow-lg transition duration-150 ease-in-out ">Add
                                        New Relation</button>
                                </div>
                                <div
                                    class=" justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-b1-md sm:rounded-br-md">
                                    <button type="submit"
                                        class=" inline-block font-bold px-6 py-2.5 bg-purple-900 text-white  text-md leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-purple-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out w-full"
                                        wire:click="Send()">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </main>
</div>