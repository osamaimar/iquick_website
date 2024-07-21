<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentService extends Model
{
    use HasFactory;
    protected $fillable = [
        'filed_name',
        'order_id',
        'comments'
    ];

    public function commentserviceinadmin()
    {
        return $this->belongsTo(Order::class);
    }
}
