<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JournalDetail extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public $table = 'journal_details';

    public static $search = [
        'issn_type',
        'journal_url',
    ];

    public $orderable = [
        'id',
        'journal_title',
        'journal_issn',
        'issn_type',
        'journal_url',
    ];

    public $filterable = [
        'id',
        'journal_title',
        'journal_issn',
        'issn_type',
        'journal_url',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'journal_title',
        'journal_issn',
        'issn_type',
        'journal_url',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
