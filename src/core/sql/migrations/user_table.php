<?php

namespace core\sql\migrations;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Blueprint;
use refaltor\efficiencySql\Migration;

class user_table extends Migration
{

    public function up(): void
    {
        Manager::schema()->create('users', function (Blueprint $table)
        {
            $table->id();
            $table->string('pseudo');
            $table->string('xuid');
            $table->boolean('online')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Manager::schema()->dropIfExists('users');
    }

    public function hydrate(): void
    {

    }
}