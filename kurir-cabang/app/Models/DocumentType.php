<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
  protected $table = 'document_types';
  protected $primarykey = 'id';
  protected $fillable = array('name','amount','note');
  protected $hidden = ['id', 'created_at', 'updated_at'];

}
