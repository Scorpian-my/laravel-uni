<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->firstOrFail();

        $books = [
            'رمان و داستان' => [
                ['هزار و یک شب', 185000, 12],
                ['بوف کور', 145000, 8],
                ['کلیدر', 320000, 5],
            ],
            'کتاب فنی' => [
                ['لاراول عملی', 380000, 25],
                ['کد تمیز', 290000, 18],
                ['الگوهای طراحی', 420000, 10],
            ],
            'کتاب کودک' => [
                ['قصههای شبانه', 95000, 30],
                ['دنیای حیوانات', 120000, 22],
                ['الفبای شاد', 75000, 40],
            ],
        ];

        foreach ($books as $categoryName => $items) {
            $category = Category::whereBelongsTo($user)->where('name', $categoryName)->firstOrFail();

            foreach ($items as [$title, $price, $stock]) {
                Task::factory()->create([
                    'user_id' => $user->id,
                    'category_id' => $category->id,
                    'title' => $title,
                    'price' => $price,
                    'stock' => $stock,
                ]);
            }
        }
    }
}
