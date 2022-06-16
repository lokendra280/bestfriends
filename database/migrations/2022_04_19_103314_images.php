<?php
use App\Models\ProductsVariants;
use App\Models\Product;
use Illuminate\Console\Scheduling\Schedule;
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
        Schema::create("images", function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class) ->nullable()->constrained();
            $table
                ->foreignIdFor(ProductsVariants::class)
                ->nullable()
                ->constrained();
            $table->string("src");
            $table->string("driveid")->nullable();
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
