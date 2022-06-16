<div>
    <script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('List of Users') }} </h2>
            <div class="text-sm flex gap-5">
                {{-- <a href="">Add Category</a> --}}
                <x-jet-nav-link href="{{ route('users.add') }}" :active="request()->routeIs('users.add')"
                    class="font-bold text-black">
                    {{ __('Add New Users') }}
                </x-jet-nav-link>  
            </div>
            
        </div>
    </x-slot>
    
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

                            <label class="mx-5">Birthdays</label>

                            <input wire:model="birthdays" type="radio" value="true" />
                        </div>
                        <form>
                            <input type="text" wire:model='searchTerm' name="search" id="search"
                                placeholder="Search Here ...." class="form-control form-control-lg mt-2 w-50">
                        </form>
                    </div>
                    <div class="mt-7 overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <tbody>
                                @forelse ($Users as $User)
                                <tr tabindex="0" class="focus:outline-none h-16 border border-gray-100 rounded">
                                    <td class="">
                                        <div class="flex items-center pl-5">
                                            <p class="text-base font-medium leading-none text-gray-700 mr-2">
                                                {{ $User->name }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="pl-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <p class="text-sm leading-none text-gray-600 ml-2">
                                                {{ $User->email }}
                                            </p>
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
                                                {{ $User->phone }}
                                            </p>
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

                                            <p class="text-sm leading-none text-gray-600 ml-2">{{
                                                date("Y-m-d",strtotime($User->date_of_birth)) }}</p>
                                        </div>
                                    </td>
                                    </td>
                                    <td class="pl-5">
                                        <div class="flex items-center">
                                            <?xml version="1.0" encoding="iso-8859-1"?>
                                            <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 502.707 502.707"
                                                style="enable-background:new 0 0 502.707 502.707;" xml:space="preserve"
                                                width="20" height="20">
                                                <g>
                                                    <path style="fill:#00E7F0;"
                                                        d="M425.361,0l14.118,12.988c5.997,5.517,58.712,55.2,62.858,100.185c3.448,37.417-17.99,83.13-36.582,114.89c-25.499,43.561-61.822,89.43-105.041,132.649L256.85,256.848l74.225-74.224l-44.169-44.169L425.361,0z" />
                                                    <path style="fill:#00D7DF;"
                                                        d="M182.626,331.072l74.224-74.223l103.864,103.864c-86.254,86.253-180.157,141.989-239.229,141.995c-2.835,0-5.627-0.125-8.31-0.372c-44.985-4.148-94.668-56.862-100.186-62.858L0.002,425.358l138.456-138.456L182.626,331.072z" />
                                                </g>
                                            </svg>

                                            <p class="text-sm leading-none text-gray-600 ml-2">
                                                {{$User->phone }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        @if($User->gender == "M")
                                        Male
                                        @elseif($User->gender == "F")
                                        Female
                                        @else
                                        Other
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('users.edit',$User->id) }}"  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Edit</a>

                                        <a target="_blank" href="{{route('enquiries.add',$User->id) }}"  class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Call</a>
                                    </td>
                                </tr>
                                @forelse($User->family()->get() as $fam)
                                <tr class="pl-32 ml-10 border-b bg-blue-100 border-blue-50">
                                    <td></td>
                                    <td class="text-sm text-gray-900 font-medium px-6 py-4 whitespace-nowrap"> {{$fam->name}}</td>
                                    <td>{{$fam->email}}</td>
                                    <td>{{$fam->phone}}</td>
                                    <td>{{$fam->pivot->relationship}}</td>
                                </tr>
                                @empty{{''}}@endforelse
                                @empty
                                <tr>
                                    <td colspan="7">Record Not Found</td>
                                </tr>
                                @endforelse
                        </table>
                        {{$Users->links()}}
                        </tbody>
                    </div>
                </div>
                <div>

                </div>
            </div>

        </div>