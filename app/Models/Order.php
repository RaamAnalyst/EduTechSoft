<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Order extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;

    public $table = 'orders';

    public $filterable = [
        'id',
        'service_type.service_type',
        'title',
        'description',
        'instructions',
        'due_date',
    ];

    public $orderable = [
        'id',
        'service_type.service_type',
        'title',
        'description',
        'instructions',
        'due_date',
        'terms',
    ];

    protected $appends = [
        'file_upload',
    ];

    protected $casts = [
        'terms' => 'boolean',
    ];

    protected $dates = [
        'due_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'service_type_id',
        'title',
        'description',
        'instructions',
        'due_date',
        'terms',
    ];

    public function serviceType()
    {
        return $this->belongsTo(Service::class);
    }

    public function getDueDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getFileUploadAttribute()
    {
        return $this->getMedia('order_file_upload')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
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
