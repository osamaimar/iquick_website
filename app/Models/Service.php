<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'slug',
        'image',
        'image_single',
        'small_description',
        'description',
        'price',
        'user_id',
        'status'
    ];
    public function packageArchives()
    {
        return $this->hasMany(PackageArchive::class,'service_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function packages()
    {
        return $this->belongsToMany(Package::class)->withPivot('num_service');
    }
    public function orders()
    {
        return $this->hasMany(Order::class,'type_id');
    }
    public function stocks(){
        return $this->hasMany(Stock::class, 'service_id');
    }
}
