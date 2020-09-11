<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('category_id')->constrained('categories');

            $table->timestamps();
        });

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            \CrudRestApi\Models\Article::create([
                'title' => $faker->text(70),
                'description' => $faker->realText(400),
                'category_id' => \CrudRestApi\Models\Category::query()
                    ->inRandomOrder()
                    ->first()
                    ->id,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
