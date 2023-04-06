<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public $table = 'payments';

    public $orderable = [
        'id',
        'cost_to_pay',
        'discount',
        'final_pay',
        'order_title.title',
    ];

    public $filterable = [
        'id',
        'cost_to_pay',
        'discount',
        'final_pay',
        'order_title.title',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cost_to_pay',
        'discount',
        'final_pay',
        'order_title_id',
    ];

    public function orderTitle()
    {
        return $this->belongsTo(Order::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
