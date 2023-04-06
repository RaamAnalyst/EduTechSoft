<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delivery extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public const DELIVERY_STATUS_SELECT = [
        'Open'        => 'Open',
        'In-progress' => 'In-progress',
        'Pending'     => 'Pending',
        'Closed'      => 'Closed',
    ];

    public $table = 'deliveries';

    public $orderable = [
        'id',
        'order_title.title',
        'delivery_due.due_date',
        'delivery_status',
        'user_name.name',
    ];

    public $filterable = [
        'id',
        'order_title.title',
        'delivery_due.due_date',
        'delivery_status',
        'user_name.name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_title_id',
        'delivery_due_id',
        'delivery_status',
        'user_name_id',
    ];

    public function orderTitle()
    {
        return $this->belongsTo(Order::class);
    }

    public function deliveryDue()
    {
        return $this->belongsTo(Order::class);
    }

    public function getDeliveryStatusLabelAttribute($value)
    {
        return static::DELIVERY_STATUS_SELECT[$this->delivery_status] ?? null;
    }

    public function userName()
    {
        return $this->belongsTo(User::class);
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
