<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'position_id', 'department_id', 'salary', 'employment_date'];

    protected $dates = ['employment_date'];

    public $timestamps = false;

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function getFormattedEmploymentDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['employment_date'])->format('d/m/Y');
    }
}
