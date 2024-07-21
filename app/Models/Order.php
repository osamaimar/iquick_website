<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'file',
        'status',
        'total_price',
        'description_cust',
        'type_order',
        'user_id',
        'type_id',
        'profile_id',
        'rating',
        'code'
    ];
    public function packageArchives()
    {
        return $this->hasMany(PackageArchive::class,'order_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function profile(){
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function attachments()
    {
        return $this->morphToMany(Attachment::class, 'attachmentable');
    }
    public function service(){
        return $this->belongsTo(Service::class,'type_id');
    }
    public function package(){
        return $this->belongsTo(Package::class,'type_id');
    }
    public function assignedTask(){
        return $this->belongsTo(AssignedTask::class,'order_id');
    }
    public function stocks()
    {
        return $this->hasMany(Stock::class,'order_id');
    }
    public function comment()
    {
        return $this->hasOne(CommentService::class,'order_id');
    }
}
