<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'header_logo',
        'footer_logo',
        'icon',
        'small_description',
        'about_us',
        'phone',
        'email',
        'address',
        'facebook',
        'twitter',
        'insta',
        'youtube',
        'Linkedin',
        'mail_password',
        'mail_from_address',
        'live_chat'
    ];
}
