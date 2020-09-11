<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrudCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('crud_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            \CrudRestApi\Models\CrudCategory::create([
                'title' => $faker->text(10),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crud_categories');
    }
}
