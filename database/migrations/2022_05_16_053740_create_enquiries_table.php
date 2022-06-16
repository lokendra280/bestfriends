<?php

use App\Models\UserUser;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. v
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,"caller_id")->constrained('users');
            $table->foreignIdFor(User::class,"lead_id")->constrained('users');
            $table->foreignIdFor(User::class,"for_id")->constrained('users');
            $table->text("call_breif");
            $table->string("call_status");
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
        Schema::dropIfExists('enquiries');
    }
};
