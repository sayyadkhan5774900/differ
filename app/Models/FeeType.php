<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class FeeType extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'fee_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TYPE_SELECT = [
        'monthly' => 'Monthly',
        'onetime' => 'One Time',
    ];

    protected $fillable = [
        'title',
        'fee',
        'type',
        'no_of_months',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
