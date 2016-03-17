<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
  protected $table = 'documents';
  protected $primarykey = 'id';
  protected $fillable = array('trx','doc_name','no_doc','doc_address','doc_phone','doc_note','branch_id','doc_status','doc_name_received');
  protected $hidden = ['id','created_at', 'updated_at'];

}
