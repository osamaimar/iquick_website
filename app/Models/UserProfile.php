<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'username',
        'date_of_Birth',
        'gender',
        'profile_image',
        'country',
        'city',
        'post_number',
        'address',
        'phone',
        'user_id',
        'code'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
