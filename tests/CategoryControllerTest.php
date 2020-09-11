<?php


namespace Tests;


use CrudRestApi\Models\Article;
use CrudRestApi\Models\Category;
use Faker\Factory;

class CategoryControllerTest extends TestCase
{
    protected $baseUrl = 'api/categories';

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
        $response = $this->get("{$this->baseUrl}");

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
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
            ],);
    }

    public function testUpdate()
    {
        $categoryId = Category::query()
            ->inRandomOrder()
            ->first()
            ->id;

        $faker = Factory::create();

        $response = $this->put("{$this->baseUrl}/{$categoryId}", [
            'title' => $faker->text(70),
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
            ],);
    }

    public function testDestroy()
    {
        $categoryId = Category::query()
            ->inRandomOrder()
            ->first()
            ->id;

        $response = $this->delete("{$this->baseUrl}/{$categoryId}");

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
                'status',
            ],);
    }
}
