<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('roles_x_permissions', function (Blueprint $table) {
            $table->foreignId('role_id')->constrained();
            $table->foreignId('permission_id')->constrained();

            $table->primary(['role_id', 'permission_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles_x_permissions');
    }
};
