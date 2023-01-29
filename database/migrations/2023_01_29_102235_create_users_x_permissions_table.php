<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users_x_permissions', function (Blueprint $table) {
            $table->foreignUuid('user_id')->constrained();
            $table->foreignId('permission_id')->constrained();

            $table->primary(['user_id', 'permission_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users_x_permissions');
    }
};
