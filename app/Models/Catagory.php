<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Catagory extends Model
{
    use HasFactory;

    public function fill(array $attributes){
        parent::fill($attributes);
        $this->slug = Str::slug($this->name);
    }

    protected $fillable = [
        'name',
    ];
}
