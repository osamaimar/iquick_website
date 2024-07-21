<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionTitle extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'user_id',
        'profile_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function profile(){
        return $this->belongsTo(Profile::class,'profile_id');
    }
    public function sections()
    {
        return $this->hasMany(Section::class,'title_id');
    }
}
