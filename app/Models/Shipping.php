<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class Shipping extends Model
{
    use HasFactory;
    // protected $fillable = ['name','address','address_house','phone','email','notes','method'];
    protected $table = 'tbl_shipping';
    protected $primaryKey ='id';
}
