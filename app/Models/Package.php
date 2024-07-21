<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'slug',
        'image',
        'image_single',
        'description',
        'price',
        'small_description',
        'user_id',
    ];
    public function packageArchives()
    {
        return $this->hasMany(PackageArchive::class,'package_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('num_service');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'type_id');
    }
}
