<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    use Translatable;
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['slug','image','is_active'];
}
