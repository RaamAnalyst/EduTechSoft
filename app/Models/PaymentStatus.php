<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentStatus extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public const PAYMENT_STATUS_SELECT = [
        'Completed'           => 'Completed',
        'Partially Completed' => 'Partially Completed',
        'Incomplete'          => 'Incomplete',
        'Crossed Due Date'    => 'Crossed Due Date',
    ];

    public $table = 'payment_statuses';

    public $orderable = [
        'id',
        'order_title.title',
        'payment_cost.final_pay',
        'paid_cost',
        'payment_status',
    ];

    public $filterable = [
        'id',
        'order_title.title',
        'payment_cost.final_pay',
        'paid_cost',
        'payment_status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_title_id',
        'payment_cost_id',
        'paid_cost',
        'payment_status',
    ];

    public function orderTitle()
    {
        return $this->belongsTo(Order::class);
    }

    public function paymentCost()
    {
        return $this->belongsTo(Payment::class);
    }

    public function getPaymentStatusLabelAttribute($value)
    {
        return static::PAYMENT_STATUS_SELECT[$this->payment_status] ?? null;
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
