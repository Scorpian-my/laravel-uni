<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    public function test_index_returns_only_the_tasks_of_the_authenticated_user(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $category = Category::factory()->create(['user_id' => $user->id]);
        $mine = Task::factory()->create(['user_id' => $user->id, 'category_id' => $category->id]);
        $foreign = Task::factory()->create();

        $response = $this->getJson('/api/tasks');

        $response->assertOk()
            ->assertJsonCount(1)
            ->assertJsonPath('0.id', $mine->id)
            ->assertJsonPath('0.category.id', $category->id)
            ->assertJsonMissing(['id' => $foreign->id]);
    }

    public function test_index_filters_tasks_by_category(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $wanted = Category::factory()->create(['user_id' => $user->id]);
        $other = Category::factory()->create(['user_id' => $user->id]);
        $task = Task::factory()->create(['user_id' => $user->id, 'category_id' => $wanted->id]);
        Task::factory()->create(['user_id' => $user->id, 'category_id' => $other->id]);

        $response = $this->getJson("/api/tasks?category_id={$wanted->id}");

        $response->assertOk()
            ->assertJsonCount(1)
            ->assertJsonPath('0.id', $task->id);
    }

    public function test_store_creates_task_and_returns_201(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create(['user_id' => $user->id]);
        Sanctum::actingAs($user);

        $response = $this->postJson('/api/tasks', [
            'title' => 'Write tests',
            'description' => 'Cover the API',
            'category_id' => $category->id,
        ]);

        $response->assertCreated()
            ->assertJsonPath('title', 'Write tests')
            ->assertJsonPath('is_done', false);
        $this->assertDatabaseHas('tasks', [
            'title' => 'Write tests',
            'user_id' => $user->id,
            'category_id' => $category->id,
            'is_done' => false,
        ]);
    }

    public function test_store_rejects_a_category_owned_by_another_user_with_422(): void
    {
        $user = User::factory()->create();
        $foreignCategory = Category::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->postJson('/api/tasks', [
            'title' => 'Cannot use this',
            'category_id' => $foreignCategory->id,
        ]);

        $response->assertUnprocessable()->assertJsonValidationErrors('category_id');
        $this->assertDatabaseMissing('tasks', ['title' => 'Cannot use this']);
    }

    public function test_store_rejects_a_missing_title_with_422(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create(['user_id' => $user->id]);
        Sanctum::actingAs($user);

        $this->postJson('/api/tasks', ['category_id' => $category->id])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('title');
    }

    public function test_show_returns_the_task(): void
    {
        $task = Task::factory()->create();
        Sanctum::actingAs($task->user);

        $this->getJson("/api/tasks/{$task->id}")
            ->assertOk()
            ->assertJsonPath('title', $task->title);
    }

    public function test_show_returns_404_for_another_users_task(): void
    {
        $task = Task::factory()->create();
        Sanctum::actingAs(User::factory()->create());

        $this->getJson("/api/tasks/{$task->id}")->assertNotFound();
    }

    public function test_update_changes_is_done_and_returns_200(): void
    {
        $task = Task::factory()->create();
        Sanctum::actingAs($task->user);

        $response = $this->putJson("/api/tasks/{$task->id}", ['is_done' => true]);

        $response->assertOk()->assertJsonPath('is_done', true);
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'is_done' => true]);
    }

    public function test_update_returns_404_for_another_users_task(): void
    {
        $task = Task::factory()->create();
        Sanctum::actingAs(User::factory()->create());

        $this->putJson("/api/tasks/{$task->id}", ['is_done' => true])->assertNotFound();
        $this->assertDatabaseHas('tasks', ['id' => $task->id, 'is_done' => false]);
    }

    public function test_destroy_deletes_the_task_and_returns_204(): void
    {
        $task = Task::factory()->create();
        Sanctum::actingAs($task->user);

        $response = $this->deleteJson("/api/tasks/{$task->id}");

        $response->assertNoContent();
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function test_destroy_returns_404_for_another_users_task(): void
    {
        $task = Task::factory()->create();
        Sanctum::actingAs(User::factory()->create());

        $this->deleteJson("/api/tasks/{$task->id}")->assertNotFound();
        $this->assertDatabaseHas('tasks', ['id' => $task->id]);
    }
}
