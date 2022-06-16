<?php

use App\Models\AttributeMeta;
use App\Models\User;
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
        Schema::create("user_meta", function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(AttributeMeta::class,"key")->constrained('attribute_meta');
            $table->text('value');
            $table->foreignIdFor(User::class)->constrained('users');
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
