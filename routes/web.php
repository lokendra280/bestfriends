<?php

use App\Http\Livewire\Products\Display as DisplayProduct;
use App\Http\Livewire\Products\Add as AddProduct;

use App\Http\Livewire\Products\Category\Add as AddProductCategory;
use App\Http\Livewire\Products\Category\Display as DisplayProductCategory;
use App\Http\Livewire\Products\Edit;
use App\Http\Livewire\Products\Trashbin;
use App\Http\Livewire\User\Add as AddUser;
use App\Http\Livewire\User\Display as ListUser;
use App\Http\Livewire\Enquiries\Add as AddEnquiries;
use App\Http\Livewire\Enquiries\Display as DisplayEnquiries;
use App\Http\Livewire\User\Users;
use App\Http\Livewire\Order\Display as DisplayOrder;
use App\Http\Livewire\Order\Lists as OrderList;
use App\Http\Livewire\Order\Invoice as OrderInvoice;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    return view("welcome");
});

Route::middleware([
    "auth:sanctum",
    config("jetstream.auth_session"),
    "verified",
])->group(function () {
    Route::get("/dashboard", function () {
        return view("dashboard");
    })->name("dashboard");
});

Route::get("/products/list", DisplayProduct::class)->name("products");
Route::get("/products/add", Addproduct::class)->name("addproducts");
Route::get("/products/trashbin", Trashbin::class)->name("trashbin");

// edit product form
Route::get("/products/edit/{product_id}", Addproduct::class)->name("editproducts");


Route::get("/product/categories", DisplayProductCategory::class)->name(
    "viewCategory"
);
Route::any("/product/category/add", AddProductCategory::class)->name(
    "addCategory"
);

Route::get("/products/list", DisplayProduct::class)->name("products");
Route::get("/products/add", Addproduct::class)->name("addproducts");
Route::get("/products/details", AddProduct::class)->name("details");

Route::get("/product/categories", DisplayProductCategory::class)->name(
    "viewCategory"
);

// Route::get("/product.")->group(function () {
//     Route::get("/categories", function () {
//         // Route assigned name "admin.users"...
//     })->name("categories");
// });

Route::any("/product/category/add", AddProductCategory::class)->name(
    "addCategory"
);
//edit category
Route::any("/product/category/edit/{category_id}", AddProductCategory::class)->name("editcategory");
// add user

Route::name('users.')->group(function () {
    Route::get("/users/list", ListUser::class)->name("list");
    Route::get("/users/add", AddUser::class)->name("add");
    Route::any("/users/edit/{user_id}", AddUser::class)->name("edit");
    // Route::get("/users/exportuser", ListUser::class)->name("exportuser");
 
});
Route::name('enquiries.')->group(function () {
    Route::get("/enquiries/{user_id}", AddEnquiries::class)->name("add");
    Route::get("/enquirieslist", OrderList::class)->name("enquirieslist");

});
Route::name('orders.')->group(function () {
    Route::get("/orders/display", DisplayOrder::class)->name("display");
    Route::get("/orders/{order_id}", OrderInvoice::class)->name("OrderInvoice");
});


