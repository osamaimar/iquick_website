<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignedTask extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'admin_id',
        'user_task_id',
        'start_date',
        'end_date',
        'time_duration',
        'notes',
        'order_id'
    ];
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
    

}
