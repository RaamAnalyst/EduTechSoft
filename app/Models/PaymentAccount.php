<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentAccount extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public $table = 'payment_accounts';

    public $orderable = [
        'id',
        'bank_account_number',
        'bank_name',
        'bank_branch',
        'ifsc_code',
        'paypal_email',
        'upi_mobile_number',
        'upi',
    ];

    public $filterable = [
        'id',
        'bank_account_number',
        'bank_name',
        'bank_branch',
        'ifsc_code',
        'paypal_email',
        'upi_mobile_number',
        'upi',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bank_account_number',
        'bank_name',
        'bank_branch',
        'ifsc_code',
        'paypal_email',
        'upi_mobile_number',
        'upi',
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
