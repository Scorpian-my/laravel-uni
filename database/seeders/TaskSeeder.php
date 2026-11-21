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

        $flights = [
            'ایرانایر' => [
                ['تهران', 'مشهد', 'IR310', 1850000, 42, 1, 8],
                ['تهران', 'شیراز', 'IR425', 1520000, 30, 2, 11],
                ['تهران', 'اصفهان', 'IR510', 980000, 55, 3, 14],
            ],
            'ماهان ایر' => [
                ['تهران', 'کیش', 'W5112', 2450000, 18, 1, 10],
                ['تهران', 'دبی', 'W578', 6900000, 12, 4, 7],
                ['مشهد', 'کیش', 'W5450', 2100000, 25, 5, 13],
            ],
            'زاگرس ایر' => [
                ['تهران', 'تبریز', 'ZP210', 1150000, 35, 2, 9],
                ['تهران', 'بندرعباس', 'ZP340', 1780000, 20, 6, 12],
                ['شیراز', 'اهواز', 'ZP415', 850000, 40, 7, 16],
            ],
        ];

        foreach ($flights as $airlineName => $items) {
            $airline = Category::whereBelongsTo($user)->where('name', $airlineName)->firstOrFail();

            foreach ($items as [$origin, $destination, $number, $price, $stock, $days, $hour]) {
                $departure = now()->addDays($days)->setTime($hour, 0);

                Task::factory()->create([
                    'user_id' => $user->id,
                    'category_id' => $airline->id,
                    'title' => $origin.' → '.$destination,
                    'origin' => $origin,
                    'destination' => $destination,
                    'departure_at' => $departure,
                    'arrival_at' => $departure->copy()->addHours(2),
                    'flight_number' => $number,
                    'price' => $price,
                    'stock' => $stock,
                ]);
            }
        }
    }
}
