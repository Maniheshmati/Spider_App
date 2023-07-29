<?php

namespace App\Models;

use App\Exports\PostExport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel;


class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'user_id', 'category_id'];

    public function user(){
        return $this->belongsTo(User::class);

    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
