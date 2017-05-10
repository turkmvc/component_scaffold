<?php
namespace Components\Category\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title','active'];
}
