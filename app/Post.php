<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // {
    // use HasFactory;
    // public $guarded = ['id', 'created_at'];
    // }
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    public function user()
    {
        return $this->belongsTo(
            'App\User',
        );
    }
}
