<?php

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Degree extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'degrees';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TYPE_SELECT = [
        'semester' => 'Semester',
        'annual'   => 'Annual',
    ];

    const FEE_TYPE_SELECT = [
        'onetime' => 'One Time',
        'monthly' => 'Monthly',
    ];

    protected $fillable = [
        'name',
        'description',
        'type',
        'fee',
        'fee_type',
        'duration',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function degreeBatches()
    {
        return $this->hasMany(Batch::class, 'degree_id', 'id');
    }

    public function degreeStudents()
    {
        return $this->hasMany(Student::class, 'degree_id', 'id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}
