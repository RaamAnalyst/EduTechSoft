<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SearchArticle extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public $table = 'search_articles';

    public static $search = [
        'authors',
        'journal_url',
        'abstract_title',
    ];

    public $orderable = [
        'id',
        'authors.author_name',
        'journal_title.journal_title',
        'issn_type.issn_type',
        'journal_issn.journal_issn',
        'journal_url.journal_url',
        'publisher_name.publisher_name',
        'abstract_title',
        'description',
        'link_to_journal',
    ];

    public $filterable = [
        'id',
        'authors.author_name',
        'journal_title.journal_title',
        'issn_type.issn_type',
        'journal_issn.journal_issn',
        'journal_url.journal_url',
        'publisher_name.publisher_name',
        'abstract_title',
        'description',
        'link_to_journal',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'authors_id',
        'journal_title_id',
        'issn_type_id',
        'journal_issn_id',
        'journal_url_id',
        'publisher_name_id',
        'abstract_title',
        'description',
        'link_to_journal',
    ];

    public function authors()
    {
        return $this->belongsTo(AuthorDetail::class);
    }

    public function journalTitle()
    {
        return $this->belongsTo(JournalDetail::class);
    }

    public function issnType()
    {
        return $this->belongsTo(JournalDetail::class);
    }

    public function journalIssn()
    {
        return $this->belongsTo(JournalDetail::class);
    }

    public function journalUrl()
    {
        return $this->belongsTo(JournalDetail::class);
    }

    public function publisherName()
    {
        return $this->belongsTo(Publisher::class);
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
