<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('todo_lists');

        if (!Schema::hasTable('todo_lists')) {
            Schema::create('todo_lists', function (Blueprint $table) {

                $table->charset = 'utf8mb4';
                $table->collation = 'utf8mb4_unicode_ci';

                $table->integer("TodoListId", true, true)->index();
                $table->integer("UserId")->index();
                $table->string("TodoTitle")->nullable();
                $table->string("TodoDescription")->nullable();
                $table->boolean("Status");

                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_lists');
    }
}