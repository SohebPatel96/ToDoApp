<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'due_date', 'category_id'];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class,'id', 'category_id');
    }
}
