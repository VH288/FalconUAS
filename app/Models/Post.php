<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\carbon;
class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'post_time',
        'likes',
        'user_id'
    ];
    public function getPostTimeAttribute(){
        if(!is_null($this->attributes['post_time'])){
            return Carbon::parse($this->attributes['post_time'])->format('Y-m-d H:i:s');
        }
    }
}
