<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrudArticlesTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        Schema::create('crud_articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('category_id')
                ->constrained('crud_categories');

            $table->timestamps();
        });

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            \CrudRestApi\Models\CrudArticle::create([
                'title' => $faker->text(70),
                'description' => $faker->realText(400),
                'category_id' => \CrudRestApi\Models\CrudCategory::query()
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
        Schema::dropIfExists('crud_articles');
    }
}
