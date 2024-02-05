<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable =['content','idea_id','user_id'];

    public function idea(){

        return $this->BelongsTo(Idea::class);
    }

    public function user(){

        return $this->BelongsTo(User::class);
    }
}
