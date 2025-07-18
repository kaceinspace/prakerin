<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'thumbnail', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
