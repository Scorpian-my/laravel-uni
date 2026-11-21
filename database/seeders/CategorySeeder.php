<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->firstOrFail();

        foreach (['ایرانایر', 'ماهان ایر', 'زاگرس ایر'] as $name) {
            Category::factory()->create([
                'user_id' => $user->id,
                'name' => $name,
            ]);
        }
    }
}
