<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'order_id',
        'service_id',
        'description',
        'file'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function service(){
        return $this->belongsTo(Service::class, 'service_id');
    }

}
