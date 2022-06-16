<?php

use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductsVariants;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("line_items", function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Orders::class)->constrained("orders");
            $table->foreignIdFor(Product::class)->constrained("products");
            $table
                ->foreignIdFor(ProductsVariants::class, "variant_id")
                ->constrained("products_variants");
            $table->string("title");
            $table->string("variant_title");
            $table->string("line_price");
            $table->string("total_price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
