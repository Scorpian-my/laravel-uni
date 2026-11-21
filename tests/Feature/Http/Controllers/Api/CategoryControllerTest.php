<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Category;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    public function test_index_returns_only_the_categories_of_the_authenticated_user(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $mine = Category::factory()->count(2)->create(['user_id' => $user->id]);
        $foreign = Category::factory()->create();

        $response = $this->getJson('/api/categories');

        $response->assertOk()->assertJsonCount(2)->assertJsonMissing(['name' => $foreign->name]);
        $this->assertSame(
            [$mine[1]->name, $mine[0]->name],
            collect($response->json())->pluck('name')->all(),
        );
    }

    public function test_store_creates_category_and_returns_201(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->postJson('/api/categories', ['name' => 'Work']);

        $response->assertCreated()->assertJsonPath('name', 'Work');
        $this->assertDatabaseHas('categories', ['name' => 'Work', 'user_id' => $user->id]);
    }

    public function test_store_rejects_an_empty_name_with_422(): void
    {
        Sanctum::actingAs(User::factory()->create());

        $response = $this->postJson('/api/categories', ['name' => '']);

        $response->assertUnprocessable()->assertJsonValidationErrors('name');
    }

    public function test_show_returns_the_category(): void
    {
        $category = Category::factory()->create();
        Sanctum::actingAs($category->user);

        $response = $this->getJson("/api/categories/{$category->id}");

        $response->assertOk()->assertJsonPath('name', $category->name);
    }

    public function test_show_returns_404_for_another_users_category(): void
    {
        $category = Category::factory()->create();
        Sanctum::actingAs(User::factory()->create());

        $this->getJson("/api/categories/{$category->id}")->assertNotFound();
    }

    public function test_update_changes_the_name_and_returns_200(): void
    {
        $category = Category::factory()->create(['name' => 'Old']);
        Sanctum::actingAs($category->user);

        $response = $this->putJson("/api/categories/{$category->id}", ['name' => 'New']);

        $response->assertOk()->assertJsonPath('name', 'New');
        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'New']);
    }

    public function test_update_returns_404_for_another_users_category(): void
    {
        $category = Category::factory()->create();
        Sanctum::actingAs(User::factory()->create());

        $this->putJson("/api/categories/{$category->id}", ['name' => 'Hacked'])->assertNotFound();
        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => $category->name]);
    }

    public function test_destroy_deletes_the_category_and_returns_204(): void
    {
        $category = Category::factory()->create();
        Sanctum::actingAs($category->user);

        $response = $this->deleteJson("/api/categories/{$category->id}");

        $response->assertNoContent();
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_destroy_returns_404_for_another_users_category(): void
    {
        $category = Category::factory()->create();
        Sanctum::actingAs(User::factory()->create());

        $this->deleteJson("/api/categories/{$category->id}")->assertNotFound();
        $this->assertDatabaseHas('categories', ['id' => $category->id]);
    }
}
