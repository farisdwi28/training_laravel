<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';

    protected $primaryKey = 'emp_id';

    protected $fillable = ['emp_code', 'emp_name'];

    public $timestamps = false;
}
