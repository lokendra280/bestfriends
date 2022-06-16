<?php
use App\Models\Product;
use App\Models\AttributeMeta;
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
        Schema::create("product_attribute", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignIdFor(AttributeMeta::class, "key")
                ->constrained("attribute_meta");
            $table->text("value");
            $table->foreignIdFor(Product::class)->constrained("products");
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
