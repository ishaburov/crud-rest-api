<?php


namespace Tests;


use CrudRestApi\Models\CrudArticle;
use Faker\Factory;

class ArticleControllerTest extends TestCase
{
    protected $baseUrl = 'api/articles';

    public function testIndex()
    {
        $response = $this->get($this->baseUrl);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'items',
                    'meta',
                ],
                'status',
            ],);
    }

    public function testShow()
    {
        $articleId = CrudArticle::query()->inRandomOrder()->first()->id;

        $response = $this->get("{$this->baseUrl}/{$articleId}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
            ],);
    }

    public function testStore()
    {
        $faker = Factory::create();

        $response = $this->post("{$this->baseUrl}", [
            'title' => $faker->text(70),
            'description' => $faker->realText(400),
            'category_id' => \CrudRestApi\Models\CrudCategory::query()
                ->inRandomOrder()
                ->first()
                ->id,
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
            ],);
    }

    public function testUpdate()
    {
        $articleId = CrudArticle::query()->inRandomOrder()->first()->id;

        $faker = Factory::create();

        $response = $this->put("{$this->baseUrl}/{$articleId}", [
            'title' => $faker->text(70),
            'description' => $faker->realText(400),
            'category_id' => \CrudRestApi\Models\CrudCategory::query()
                ->inRandomOrder()
                ->first()
                ->id,
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
            ],);
    }

    public function testDestroy()
    {
        $articleId = CrudArticle::query()->inRandomOrder()->first()->id;
        $response = $this->delete("{$this->baseUrl}/{$articleId}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
            ],);
    }
}
