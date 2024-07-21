<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_name',
        'order_code',
        'order_status',
        'filed_name',
        'attchname',
        'user_id',
        'messages',
        'order_id',
        'employee_type',
        'employee_id'
    ];
}
