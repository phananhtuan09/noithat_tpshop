<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'tbl_notification';
    protected $fillable = ['name','phone','quantily','total'];
    protected $primaryKey ='id';
}
