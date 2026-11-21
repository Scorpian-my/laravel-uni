<?php

namespace App\Models;

use Database\Factories\TaskFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['category_id', 'title', 'origin', 'destination', 'departure_at', 'arrival_at', 'flight_number', 'price', 'stock', 'image', 'description', 'is_done'])]
class Task extends Model
{
    /** @use HasFactory<TaskFactory> */
    use HasFactory;

    /**
     * Mirror the database default so freshly created tasks expose it immediately.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'price' => 0,
        'stock' => 0,
        'is_done' => false,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'departure_at' => 'datetime',
            'arrival_at' => 'datetime',
            'price' => 'decimal:2',
            'stock' => 'integer',
            'is_done' => 'boolean',
        ];
    }
}
