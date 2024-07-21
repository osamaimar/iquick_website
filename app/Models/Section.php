<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'small_title',
        'description',
        'file',
        'title_id'
    ];
    public function sectiontitle(){
        return $this->belongsTo(SectionTitle::class,'title_id');
    }
}
