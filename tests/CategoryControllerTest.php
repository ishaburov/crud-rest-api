<?php


namespace Tests;


use CrudRestApi\Models\CrudArticle;
use CrudRestApi\Models\CrudCategory;
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
        $categoryId = CrudCategory::query()
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
        $categoryId = CrudCategory::query()
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
