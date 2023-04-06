<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class BrowseAssignment extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;

    public $table = 'browse_assignments';

    public static $search = [
        'question',
        'solution',
    ];

    public $orderable = [
        'id',
        'title',
        'question',
        'solution',
        'categories.categories',
        'tags.tags',
    ];

    public $filterable = [
        'id',
        'title',
        'question',
        'solution',
        'categories.categories',
        'tags.tags',
    ];

    protected $appends = [
        'attachments',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'question',
        'solution',
        'categories_id',
        'tags_id',
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsTo(Category::class);
    }

    public function getAttachmentsAttribute()
    {
        return $this->getMedia('browse_assignment_attachments')->map(function ($item) {
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
