<?php

namespace Tests\Feature\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Tests\TestCase;

class CategoryPolicyTest extends TestCase
{
    public function test_owner_can_view_update_and_delete_the_category(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create(['user_id' => $user->id]);

        $this->assertTrue(Gate::forUser($user)->allows('view', $category));
        $this->assertTrue(Gate::forUser($user)->allows('update', $category));
        $this->assertTrue(Gate::forUser($user)->allows('delete', $category));
    }

    public function test_other_user_cannot_view_update_or_delete_the_category(): void
    {
        $category = Category::factory()->create();
        $otherUser = User::factory()->create();

        $this->assertTrue(Gate::forUser($otherUser)->denies('view', $category));
        $this->assertTrue(Gate::forUser($otherUser)->denies('update', $category));
        $this->assertTrue(Gate::forUser($otherUser)->denies('delete', $category));
        $this->assertSame(404, Gate::forUser($otherUser)->inspect('view', $category)->status());
    }
}
