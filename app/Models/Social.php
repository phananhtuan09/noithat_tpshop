<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class Social extends Authenticatable
{
    public $timestamps = false;
    protected $fillable = [
          'name',  'email','provider_id','avatar','provider','customer_id'
    ];
 
    protected $primaryKey = 'id';
 	protected $table = 'tbl_social';

 
 	
}
