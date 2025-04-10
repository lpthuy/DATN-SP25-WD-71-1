<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
        'rating',
        'product_id',
        'user_id',
        'name',
        'email',
        'is_visible'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'rating' => 'integer',
        'is_visible' => 'boolean',
        'created_at' => 'datetime:d/m/Y H:i',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'star_rating',
        'formatted_date'
    ];

    /**
     * Relationship with Product
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withDefault([
            'name' => 'Sản phẩm đã xóa'
        ]);
    }

    /**
     * Relationship with User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Khách',
            'email' => ''
        ]);
    }

    /**
     * Get the star rating HTML
     */
    public function getStarRatingAttribute(): string
    {
        $rating = $this->rating;
        $fullStars = floor($rating);
        $hasHalfStar = ($rating - $fullStars) >= 0.5;
        $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);

        $stars = str_repeat('<i class="fas fa-star text-warning"></i>', $fullStars);
        
        if ($hasHalfStar) {
            $stars .= '<i class="fas fa-star-half-alt text-warning"></i>';
        }
        
        return $stars . str_repeat('<i class="far fa-star text-warning"></i>', $emptyStars);
    }

    /**
     * Get formatted created_at date
     */
    public function getFormattedDateAttribute(): string
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    /**
     * Get average rating for a product
     */
    public static function getAverageRating(int $productId): float
    {
        return (float) self::forProduct($productId)
            ->visible()
            ->avg('rating');
    }

    /**
     * Get average star rating HTML and stats
     */
    public static function getAverageStarRating(int $productId): array
    {
        $average = self::getAverageRating($productId);
        $fullStars = floor($average);
        $hasHalfStar = ($average - $fullStars) >= 0.5;
        $emptyStars = 5 - $fullStars - ($hasHalfStar ? 1 : 0);

        $stars = str_repeat('<i class="fas fa-star text-warning"></i>', $fullStars);
        
        if ($hasHalfStar) {
            $stars .= '<i class="fas fa-star-half-alt text-warning"></i>';
        }
        
        return [
            'html' => $stars . str_repeat('<i class="far fa-star text-warning"></i>', $emptyStars),
            'average' => number_format($average, 1),
            'count' => self::forProduct($productId)->visible()->count()
        ];
    }

    /**
     * Scope for visible comments
     */
    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    /**
     * Scope for product comments
     */
    public function scopeForProduct($query, int $productId)
    {
        return $query->where('product_id', $productId);
    }

    /**
     * Scope for recent comments first
     */
    public function scopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}