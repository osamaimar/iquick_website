<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'link',
        'file',
        'user_id',
        'code',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function attachments()
    {
        return $this->morphToMany(Attachment::class, 'attachmentable');
    }
    public function crudevents()
    {
        return $this->hasMany(CrudEvents::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function sectiontitles()
    {
        return $this->hasMany(SectionTitle::class,'user_id');
    }
}
