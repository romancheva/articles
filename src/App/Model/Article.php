<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'Articles';

    protected $fillable = ['name', 'text'];

    public $timestamps = false;
}