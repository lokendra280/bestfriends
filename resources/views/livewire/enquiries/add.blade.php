<div class="max-w-7xl mx-auto sm:px-6  py-3 lg:px-8">
  <script src="https://cdn.tailwindcss.com"></script>
  <div class="align-middle sm:rounded-md  inline-block w-full py-4 overflow-hidden bg-white shadow px-3">
    <div>
      @if (session()->has('message'))
      <div class="bg-green-500 border-1 border-green-600 rounded mb-2 mt-2 p-2">
        <h1 class="text-white font-bold first-letter: "></h1>
        {{ session('message') }}
      </div>
    </div>
    @endif
  </div>
  <div class="grid lg:grid-cols-3 sm:grid-cols-1 lg:gap-4">
    <div>
      <div class="max-w-sm bg-white shadow sm:rounded-lg overflow-hidden ">
        <div class="flex items-center px-6 py-3 bg-gray-900">
          <h1 class="mx-3 text-white font-semibold text-lg">{{$current_user->name}}</h1>
        </div>
      </div>
      <div class="flex py-1">
        <h3 class="border rounded-r px-4 py-2 w-full mb-5">
          <lable>Death Of Birth: </lable>{{date("Y-m-d",strtotime($current_user->date_of_birth)) }}
        </h3>
      </div>
      <h1>{{$birthdayMessage}}</h1>
      <div>
        @php
        $birthday = $current_user->date_of_birth;
        $age = Carbon\Carbon::parse($birthday)->diff(Carbon\Carbon::now())->format('%y',);
        @endphp
        <h3 class="border rounded-r px-4 py-2 w-full mb-3"> <label>Age:</label>{{$age}}</h3>
      </div>

      <button
        class="mr-3  ml-2  mb-4 w-32 text-sm bg-green-500 hover:bg-green-700 text-white py-2 px-4 font-semibold rounded-xl focus:outline-none focus:shadow-outline"
        wire:click="selectLead({{$current_user->id}})">Call</button>
      <div class="flex items-center px-6 py-3 bg-gray-900">
        <h1 class="mx-3 text-white font-semibold text-lg">Relatives</h1>
      </div>
      <table>
        @forelse($current_user->family()->get() as $fam)
        <tr>
          <p class=" border rounded-r px-4  mt-4 "><label>Relation :- </label>{{$fam->pivot->relationship}}</p>
          <p class="border rounded-r px-4  mt-2"><label>Name :- </label>{{$fam->name}}</p>
          <p class="border rounded-r px-4  mt-2"><label>Phone Number :- </label>{{$fam->phone}}</p>
          <button
            class="mr-3 mt-3 ml-2  w-32 text-sm bg-green-500 hover:bg-green-700 text-white py-2 px-4 font-semibold rounded-xl focus:outline-none focus:shadow-outline"
            wire:click="selectLead({{$fam->id}})">Call</button>
        </tr>
        @empty{{''}}@endforelse
      </table>
      <div class="max-w-sm bg-white shadow sm:rounded-lg my-4 overflow-hidden">
        <div class=" items-center px-6 py-3 bg-gray-900">
          <h1 class="mx-3 text-white font-semibold text-lg">Orders History</h1>
        </div>
        @foreach ($orders as $item)
            
        <div class="w-full p-3 py-5 border-l-2 border-white hover:border-blue-500 shadow">
          <a  target="_blank"  href="{{route('enquiries.enquirieslist') }}">
          <div class="flex justify-between">
            <div>
              <p class="font-semibold text-sm">{{$item->user()->first()->created_at}}</p>
              <p class="text-gray text-xs pt-2">{{$item->user()->first()->order_status}}</p>
            </div>
            <div>
              <p class="text-gray text-xs pt-2">{{$item->user()->first()->delivery_charge}}</p>
              <p class="text-gray text-xs pt-2">{{$item->user()->first()->order_total}}</p>
            </div>
          </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
    <div>
      <div class="max-w-sm  bg-white shadow sm:rounded-lg overflow-hidden ">
        <div class="item-center px-6 py-3 bg-gray-900">
          <h1 class="mx-3 text-white font-semibold text-lg">Call Information</h1>
        </div>
        <div class="p-5">
          @if($call_lead)
          Now calling {{$call_lead->name}} ({{$call_lead->phone}})
          <textarea
            class="form-control mt-1 block w-full h-16 px-3 py-1.5 text-base font-normal text-gray-700bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
            id="exampleFormControlTextarea1" wire:model="enquiry.call_breif" rows="3"
            placeholder="Enter Call Brief"></textarea>
          <div class="flex my-5">
            <span class="text-sm  border-2 rounded-1 px-4 py-2 bg-gray-100 whitespace-nowrap mb-5">Conclusion</span>
            <select wire:model="enquiry.call_status" class="text-sm   rounded-r px-5 py-2 mb-5 w-full"
              name="call_Status" id=""><br>
              <option value="called" selected>Received</option>
              <option value="call_back" selected>Call Back</option>
              <option value="not_connection" selected>Not Connected</option>
            </select>
          </div>
          <div class="flex-auto flex space-x-3">
            <button wire:click="saveCall()"
              class="mr-3 mb-4 ml-5 text-sm bg-green-500 hover:bg-green-700 text-white py-2 px-4 font-semibold rounded-xl focus:outline-none focus:shadow-outline">Save
              Information</button>
          </div>
          @else
          {{'Select Relative to call!'}}
          @endif
        </div>
      </div>
      <div class="max-w-sm bg-white shadow sm:rounded-lg my-4 overflow-hidden">
        <div class=" items-center px-6 py-3 bg-gray-900">
          <h1 class="mx-3 text-white font-semibold text-lg">Call History</h1>
        </div>
        @foreach ($enquires as $item)
        <div class="w-full p-3 py-5 border-l-2 border-white hover:border-blue-500 shadow">
          <div class="flex justify-between">
            <div>
              <p class="font-semibold text-sm">{{$item->call_status}}: Best Friend</p>
              <p class="text-gray text-xs pt-2">{{$item->call_breif}}</p>
            </div>
            <div>
              <h1>{{$caller_name}}</h1>
              <p class="text-gray text-xs pt-2">{{date('D M Y H:i',strtotime($item->created_at))}}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div>
      <div class="max-w-sm bg-white shadow sm:rounded-lg overflow-hidden ">
        <div class="flex items-center px-6 py-3 bg-gray-900">
          <h1 class="mx-3 text-white font-semibold text-lg">Orders</h1>
        </div>
        <div class="grid grid-cols-3 gap-3 items-start p-5">
          <div class="grid grid-cols-1">
            <select class="border text-sm w-48 rounded-r px-5 py-2 " wire:model="selected_product">
              <option>Select Product</option>
              @foreach ($products as $items)
              <option value="{{$items->id}}">{{$items->name}}</option>
              @endforeach
            </select>
            @if(!is_null ($variants))
            <select class="border text-sm w-40 rounded-r px-5 h-10 mt-4" wire:model="selected_variant">
              <option selected>Select Varaints</option>
              @foreach ($variants as $item)
              <option value="{{$item->id}}">{{$item->title}}</option>
              @endforeach
            </select>
            @endif
          </div>
          <div><input type="number" class="border ml-20 text-sm rounded-r w-32 px-5 py-2" placeholder="Quantity"
              wire:model="selected_quantity"></div>
          <div><button wire:click="addToCart()" type="button" class="p-2 text-red-600 font-bold ml-24">+</button>
          </div>
        </div>
      </div>
      <div class="max-w-sm bg-white shadow sm:rounded-lg my-4 overflow-hidden px-5">
        @forelse ($cart as $index=>$item)
        <div class="flex">
          <div class="grid grid-cols-1 ml-3">
            <span
              class="h-full w-32 rounded-l  rounded-r border block  bg-white border-gray-400 text-gray-700 py-1 px-1  leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{$item['title']}}</span>
            <span
              class="h-full w-32 rounded-l mt-2  rounded-r border block  bg-white border-gray-400 text-gray-700 py-1 px-1  leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{$item['variant_title']}}</span>
          </div>
          <div
            class="h-full w-24 rounded-l   rounded-r border block  bg-white border-gray-400 text-gray-700 py-1 px-1  leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            {{$item['qty']}}</div>
          <div
            class="h-full w-24 rounded-l ml-4  rounded-r border block  bg-white border-gray-400 text-gray-700 py-1 px-1  leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            {{$item['total_price']}}</div>
          {{-- <button type="button" wire:click="deleteOrder({{ $index }})"
            class="p-2 rounded text-red-600 font-bold">X</button> --}}
        </div>
        @empty
        {{'Add products to cart'}}
        @endforelse
        <div class="flex mt-5">
          <span class="text-sm h-8 w-full border-2 rounded-l px-4  bg-gray-100 whitespace-no-wrap mb-5">Delivery
            charge</span>
          <input type="number" name="delivery" class=" border-2 h-8 w-full rounded-r px-4 mb-5 py-2"
            placeholder="Enter Delivery Charge" wire:model="delivery" wire:keyup="addDelivery">
        </div>
        <div class="">
          <textarea name="delivery_instruction" placeholder="Enter Delivery Instruction"
            class="form-control block w-full h-16 px-3 py-1.5 text-base font-normal text-gray-700bg-white bg-clip-padding  border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
            wire:model="instruction"></textarea>
        </div>
        <div class="flex-auto flex mt-6">
          <button
            class="mr-3 mb-4 ml-5 text-sm bg-green-500 hover:bg-green-700 text-white py-2 px-4 font-semibold rounded-xl focus:outline-none focus:shadow-outline"
            wire:click="saveOrder">Order Place</button>
        </div>
        <span class="ml-6"><label>Grand Total :- </label>{{$grandTotals}}</span>
        <div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>