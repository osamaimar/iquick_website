<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageArchive extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'service_id',
        'order_id',
        'package_id',
        'admin_id',
        'status',
        'service_name'
    ];
    public function user(){
        return $this->belongsTo(User::class,'admin_id');
    }
    public function package(){
        return $this->belongsTo(Package::class,'package_id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
