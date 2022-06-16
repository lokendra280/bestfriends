<html><head><link rel="stylesheet" href="https://e.bitmicrosys.com/css/app.css">
    <title>Raja Rajasheikh</title>
    </head><body _c_t_common="1" cz-shortcut-listen="true" _c_t_j1="1"><div class="antialiased sans-serif min-h-screen bg-white" style="min-height: 900px">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer=""></script>
        <style>
            [x-cloak] {
                display: none;
            }

            @media  print {
                .no-printme  {
                    display: none;
                }
                .printme  {
                    display: block;
                }
                body {
                    line-height: 1.2;
                }
            }

            @page  {
                size: A4 portrait;
                counter-increment: page;
            }

            /* Datepicker */
            .date-input {
                background-color: #fff;
                border-radius: 10px;
                padding: 0.5rem 1rem;
                z-index: 2000;
                margin: 3px 0 0 0;
                border-top: 1px solid #eee;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1),
                    0 4px 6px -2px rgba(0, 0, 0, 0.05);
            }
            .date-input.is-hidden {
                display: none;
            }
            .date-input .pika-title {
                padding: 0.5rem;
                width: 100%;
                text-align: center;
            }
            .date-input .pika-prev,
            .date-input .pika-next {
                margin-top: 0;
                /* margin-top: 0.5rem; */
                padding: 0.2rem 0;
                cursor: pointer;
                color: #4299e1;
                text-transform: uppercase;
                font-size: 0.85rem;
            }
            .date-input .pika-prev:hover,
            .date-input .pika-next:hover {
                text-decoration: underline;
            }
            .date-input .pika-prev {
                float: left;
            }
            .date-input .pika-next {
                float: right;
            }
            .date-input .pika-label {
                display: inline-block;
                font-size: 0;
            }
            .date-input .pika-select-month,
            .date-input .pika-select-year {
                display: inline-block;
                border: 1px solid #ddd;
                color: #444;
                background-color: #fff;
                border-radius: 10px;
                font-size: 0.9rem;
                padding-left: 0.5em;
                padding-right: 0.5em;
                padding-top: 0.25em;
                padding-bottom: 0.25em;
                appearance: none;
            }
            .date-input .pika-select-month:focus,
            .date-input .pika-select-year:focus {
                border-color: #cbd5e0;
                outline: none;
            }
            .date-input .pika-select-month {
                margin-right: 0.25em;
            }
            .date-input table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 0.2rem;
            }
            .date-input table th {
                width: 2em;
                height: 2em;
                font-weight: normal;
                color: #718096;
                text-align: center;
            }
            .date-input table th abbr {
                text-decoration: none;
            }
            .date-input table td {
                padding: 2px;
            }
            .date-input table td button {
                /* border: 1px solid #e2e8f0; */
                width: 1.8em;
                height: 1.8em;
                text-align: center;
                color: #555;
                border-radius: 10px;
            }
            .date-input table td button:hover {
                background-color: #bee3f8;
            }
            .date-input table td.is-today button {
                background-color: #ebf8ff;
            }
            .date-input table td.is-selected button {
                background-color: #3182ce;
            }
            .date-input table td.is-selected button {
                color: white;
            }
            .date-input table td.is-selected button:hover {
                color: white;
            }
        </style>

        <div class="border-t-8 border-gray-700 h-2"></div>
        <div class="container mx-auto py-6 px-4" x-data="invoices()">
            <div class="flex justify-between">
                <h2 class="text-2xl font-bold mb-6 pb-2 tracking-wider uppercase">Invoice</h2>
                <div>
                    <div class="relative mr-4 inline-block">
                        <div class="text-gray-500 cursor-pointer w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-300 inline-flex items-center justify-center" @mouseenter="showTooltip = true" @mouseleave="showTooltip = false" @click="printInvoice()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                <rect x="7" y="13" width="10" height="8" rx="2"></rect>
                            </svg>
                        </div>
                        <div x-show.transition="showTooltip" class="z-40 shadow-lg text-center w-32 block absolute right-0 top-0 p-2 mt-12 rounded-lg bg-gray-800 text-white text-xs" style="display: none;">
                            Print this invoice!
                        </div>
                    </div>

                </div>
            </div>

            <div class="flex mb-8 justify-between">
                <div class="w-2/4">
                    <div class="mb-2 md:mb-1 md:flex items-center">
                        <label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Order No.</label>
                        <span class="mr-4 inline-block hidden md:block">:</span>
                        <div class="flex-1">
                            76
                        </div>
                    </div>

                    <div class="mb-2 md:mb-1 md:flex items-center">
                        <label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Invoice Date</label>
                        <span class="mr-4 inline-block hidden md:block">:</span>
                        <div class="flex-1">
                            2022-05-31                        </div>
                    </div>
                </div>
                <div>
                    
                </div>
            </div>

            <div class="flex flex-wrap justify-between mb-8">
                <div class="w-full md:w-1/3 mb-2 md:mb-0">
                    <label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">Bill/Ship To:</label>
                    <div>Raja Rajasheikh</div>
                    <div>BIRTAMOD</div>
                                            <div>mahandrachowk</div>
                                        <div>9811030210</div>
                </div>
                <div class="w-full md:w-1/3">
                    <label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">From:</label>
                    <div>Best Friends</div>        
            </div>
            </div>
            <div class="flex -mx-1 border-b py-2 items-start">
                <div class="flex-1 px-1">
                    <p class="text-gray-800 uppercase tracking-wide text-sm font-bold">Product Name</p>
                </div>
                <div class="px-1 w-20 text-right">
                    <p class="text-gray-800 uppercase tracking-wide text-sm font-bold">Quantity</p>
                </div>
                <div class="px-1 w-32 text-right">
                    <p class="leading-none">
                        <span class="block uppercase tracking-wide text-sm font-bold text-gray-800">Unit Price</span>
                    </p>
                </div>
                <div class="px-1 w-32 text-right">
                    <p class="leading-none">
                        <span class="block uppercase tracking-wide text-sm font-bold text-gray-800">Amount</span>
                    </p>
                </div>
                <div class="px-1 w-20 text-center">
                </div>
            </div>
                <div class="flex -mx-1 py-2 border-b">
                    <div class="flex-1 px-1">
                        <p class="text-gray-800">Mero ID</p>
                    </div>
                    <div class="px-1 w-20 text-left">
                        <p class="text-gray-800">1</p>
                    </div>
                    <div class="px-1 w-32 text-left">
                        <p class="text-gray-800"> 1000 </p>
                    </div>
                    <div class="px-1 w-32 text-left">
                        <p class="text-gray-800"> 1000 </p>
                    </div>
                </div>
            <div class="py-2 ml-auto mt-5 w-full sm:w-2/4 lg:w-1/4">
                <div class="flex justify-between mb-3">
                    <div class="text-gray-800 text-right flex-1">Sub Total</div>
                    <div class="text-right w-40">
                        <div class="text-gray-800 font-medium"> 1000 </div>
                    </div>
                </div>
                    <div class="flex justify-between mb-4">
                    <div class="text-sm text-gray-600 text-right flex-1">Delivery Charge</div>
                    <div class="text-right w-40">
                        <div class="text-sm text-gray-600">Rs 100 </div>
                    </div>
                </div>
                <div class="py-2 border-t border-b">
                    <div class="flex justify-between">
                        <div class="text-xl text-gray-600 text-right flex-1">Grand Total</div>
                        <div class="text-right w-40">
                            <div class="text-xl text-gray-800 font-bold">Rs 1100</div>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="py-10 text-center">
                <p class="text-gray-600">Invoice was created on a computer and is valid without the signature and seal.
                </p>
            </div>
            <!-- Print Template -->
            <div id="js-print-template" x-ref="printTemplate" class="hidden">
                <div class="mb-8 flex justify-between">
                    <div>
                        <h2 class="text-3xl font-bold mb-6 pb-2 tracking-wider uppercase">Invoice</h2>
                        <div class="mb-1 flex items-center">
                            <label class="w-32 text-gray-800 block font-bold text-xs uppercase tracking-wide">Order No </label>
                            <span class="mr-4 inline-block">:</span>
                            <div>76</div>
                        </div>
                        <div class="mb-1 flex items-center">
                            <label class="w-32 text-gray-800 block font-bold text-xs uppercase tracking-wide">Invoice Date</label>
                            <span class="mr-4 inline-block">:</span>
                            <div>2022-05-31</div>
                        </div>    
                    </div>
                    <div class="pr-5">
                    </div>
                </div>
                <div class="flex justify-between mb-10">
                    <div class="w-1/2">
                        <label class="text-gray-800 block mb-2 font-bold text-xs uppercase tracking-wide">Bill/Ship To:</label>
                        <div>
                            <div>Raja Rajasheikh</div>
                            <div>BIRTAMOD</div>
                            <div>mahandrachowk</div>
                            <div>9811030210</div>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <label class="text-gray-800 block mb-2 font-bold text-xs uppercase tracking-wide">From:</label>
                        <div>
                            <div>Best Friends</div>    
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-1 border-b py-2 items-start">
                    <div class="flex-1 px-1">
                        <p class="text-gray-600 uppercase tracking-wide text-xs font-bold">Product Name</p>
                    </div>

                    
                    <div class="px-1 w-32 text-right">
                        <p class="text-gray-600 uppercase tracking-wide text-xs font-bold">Quantity</p>
                    </div>

                    <div class="px-1 w-32 text-right">
                        <p class="leading-none">
                            <span class="block uppercase tracking-wide text-xs font-bold text-gray-600">Unit Price</span>
                        </p>
                    </div>

                    <div class="px-1 w-32 text-right">
                        <p class="leading-none">
                            <span class="block uppercase tracking-wide text-xs font-bold text-gray-600">Amount</span>
                        </p>
                    </div>
                </div>

                    <div class="flex flex-wrap -mx-1 py-2 border-b">
                        <div class="flex-1 px-1">
                            <p class="text-gray-800">Mero ID</p>
                        </div>

                         
                        <div class="px-1 w-32 text-right">
                            <p class="text-gray-800">1</p>
                        </div>

                        <div class="px-1 w-32 text-right">
                            <p class="text-gray-800"> 1000 </p>
                        </div>

                        <div class="px-1 w-32 text-right">
                            <p class="text-gray-800"> 1000 </p>
                        </div>
                    </div>


                <div class="py-2 ml-auto mt-20" style="width: 320px">
                    <div class="flex justify-between mb-3">
                        <div class="text-gray-800 text-right flex-1">Sub Total</div>
                        <div class="text-right w-40">
                            <div class="text-gray-800 font-medium"> 1000 </div>
                        </div>
                    </div>

                                        <div class="flex justify-between mb-4">
                        <div class="text-sm text-gray-600 text-right flex-1">Delivery Charge</div>
                        <div class="text-right w-40">
                            <div class="text-sm text-gray-600">Rs 100</div>
                        </div>
                    </div>
                    
                    
                    <div class="py-2 border-t border-b">
                        <div class="flex justify-between">
                            <div class="text-xl text-gray-600 text-right flex-1">Grand Total</div>
                            <div class="text-right w-40">
                                <div class="text-xl text-gray-800 font-bold">Rs 1100</div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="py-10 text-center">
                    <p class="text-gray-600">Invoice was created on a computer and is valid without the signature and seal.</p>
                </div>

            </div>

            <!-- /Print Template -->

        </div>

        <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                const today = new Date();

                var picker = new Pikaday({
                    keyboardInput: false,
                    field: document.querySelector('.js-datepicker'),
                    format: 'MMM D YYYY',
                    theme: 'date-input',
                    i18n: {
                        previousMonth: "Prev",
                        nextMonth: "Next",
                        months: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "May",
                            "Jun",
                            "Jul",
                            "Aug",
                            "Sep",
                            "Oct",
                            "Nov",
                            "Dec"
                        ],
                        weekdays: [
                            "Sunday",
                            "Monday",
                            "Tuesday",
                            "Wednesday",
                            "Thursday",
                            "Friday",
                            "Saturday"
                        ],
                        weekdaysShort: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]
                    }
                });
                picker.setDate(new Date());

                var picker2 = new Pikaday({
                    keyboardInput: false,
                    field: document.querySelector('.js-datepicker-2'),
                    format: 'MMM D YYYY',
                    theme: 'date-input',
                    i18n: {
                        previousMonth: "Prev",
                        nextMonth: "Next",
                        months: [
                            "Jan",
                            "Feb",
                            "Mar",
                            "Apr",
                            "May",
                            "Jun",
                            "Jul",
                            "Aug",
                            "Sep",
                            "Oct",
                            "Nov",
                            "Dec"
                        ],
                        weekdays: [
                            "Sunday",
                            "Monday",
                            "Tuesday",
                            "Wednesday",
                            "Thursday",
                            "Friday",
                            "Saturday"
                        ],
                        weekdaysShort: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"]
                    }
                });
                picker2.setDate(new Date());
            });
            function invoices() {
                return {
                    items: [],
                    invoiceNumber: 0,
                    invoiceDate: '',
                    invoiceDueDate: '',
                    totalGST: 0,
                    netTotal: 0,
                    item: {
                        id: '',
                        name: '',
                        qty: 0,
                        rate: 0,
                        total: 0,
                        gst: 18
                    },
                    billing: {
                        name: '',
                        address: '',
                        extra: ''
                    },
                    from: {
                        name: '',
                        address: '',
                        extra: ''
                    },
                    showTooltip: false,
                    showTooltip2: false,
                    printInvoice() {
                        var printContents = this.$refs.printTemplate.innerHTML;
                        var originalContents = document.body.innerHTML;
                        document.body.innerHTML = printContents;
                        window.print();
                        window.location.reload();
                        document.body.innerHTML = originalContents;
                    }
                }
            }
        </script>

</div></body></html>
