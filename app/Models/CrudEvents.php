<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrudEvents extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'event_name', 
        'event_start', 
        'event_end',
        'description',
        'profile_id',
        'client_id',
        'status',
        'title'
    ]; 

    public function profile(){
        return $this->belongsTo(Profile::class, 'profile_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'client_id');
    }

}
