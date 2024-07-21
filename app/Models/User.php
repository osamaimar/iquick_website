<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $dates = ['deleted_at'];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'status',
        'type',
        'code',
        'chat_reply',
        'profile_id',
        'type_user'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function packages(){
        return $this->hasMany(Package::class);
    }
    public function services(){
        return $this->hasMany(Service::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function profiles()
    {
        return $this->hasMany(Attachment::class);
    }
    public function crudEvents()
    {
        return $this->hasMany(CrudEvents::class,'client_id');
    }
    public function userprofile(){
        return $this->hasOne(UserProfile::class);
    }
    public function packageArchives()
    {
        return $this->hasMany(PackageArchive::class,'admin_id');
    }
    public function emailTos()
    {
        return $this->hasMany(EmailTo::class,'user_id');
    }
    public function stocks()
    {
        return $this->hasMany(Stock::class,'order_id');
    }
    public function sectiontitles()
    {
        return $this->hasMany(SectionTitle::class,'user_id');
    }

}
