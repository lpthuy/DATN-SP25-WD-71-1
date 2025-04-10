<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'promotion';
    protected $primaryKey = 'promotion_id';

    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'usage_limit',
        'start_date',
        'end_date',
        'is_active',
        'tier_id',
        'min_purchase_amount'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'promotion_id');
    }

    public function getStatusAttribute()
    {
        if (!$this->is_active) {
            return 'Inactive';
        }

        if (Carbon::now()->greaterThan(Carbon::parse($this->end_date))) {
            return 'Expired';
        }

        if ($this->usage_limit !== null && $this->usage_limit <= 0) {
            return 'Out of Codes';
        }

        return 'Active';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1)
            ->where('start_date', '<=', Carbon::now())
            ->where('end_date', '>=', Carbon::now())
            ->where(function ($query) {
                $query->where('usage_limit', '>', 0)
                    ->orWhereNull('usage_limit');
            });
    }
}
