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

class Assignment extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;

    public $table = 'assignments';

    public $orderable = [
        'id',
        'course_title.title',
        'assignment_title',
        'assignment_description',
        'assignment_due_date',
    ];

    public $filterable = [
        'id',
        'course_title.title',
        'assignment_title',
        'assignment_description',
        'assignment_due_date',
    ];

    protected $appends = [
        'support_files',
    ];

    protected $dates = [
        'assignment_due_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'course_title_id',
        'assignment_title',
        'assignment_description',
        'assignment_due_date',
    ];

    public function courseTitle()
    {
        return $this->belongsTo(Course::class);
    }

    public function getSupportFilesAttribute()
    {
        return $this->getMedia('assignment_support_files')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getAssignmentDueDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setAssignmentDueDateAttribute($value)
    {
        $this->attributes['assignment_due_date'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
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
