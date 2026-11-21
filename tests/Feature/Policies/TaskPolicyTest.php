<?php

namespace Tests\Feature\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Tests\TestCase;

class TaskPolicyTest extends TestCase
{
    public function test_owner_can_view_update_and_delete_the_task(): void
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->assertTrue(Gate::forUser($user)->allows('view', $task));
        $this->assertTrue(Gate::forUser($user)->allows('update', $task));
        $this->assertTrue(Gate::forUser($user)->allows('delete', $task));
    }

    public function test_other_user_cannot_view_update_or_delete_the_task(): void
    {
        $task = Task::factory()->create();
        $otherUser = User::factory()->create();

        $this->assertTrue(Gate::forUser($otherUser)->denies('view', $task));
        $this->assertTrue(Gate::forUser($otherUser)->denies('update', $task));
        $this->assertTrue(Gate::forUser($otherUser)->denies('delete', $task));
        $this->assertSame(404, Gate::forUser($otherUser)->inspect('view', $task)->status());
    }
}
