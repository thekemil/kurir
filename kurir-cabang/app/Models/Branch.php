<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
  protected $table = 'branches';
  protected $primarykey = 'id';
  protected $fillable = array('name','code','address','phone','status','note');
  protected $hidden = ['id', 'created_at', 'updated_at'];

}
