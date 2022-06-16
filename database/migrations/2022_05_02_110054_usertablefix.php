<?php
// use App\Models\Area;

use App\Models\Area;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignIdFor(Area::class)->nullable()->constrained('area');
            $table->string('phone')->nullable();
            $table->enum('gender',["M","F","O"])->nullable();
            $table->dateTime('date_of_birth')->nullable();
            $table->dateTime('date_of_death')->nullable();
            $table->text('source_json')->nullable();
        });
    }

    public function down()
    {
        //
    }
};
