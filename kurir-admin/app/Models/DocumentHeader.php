<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentHeader extends Model
{
  protected $table = 'document_headers';
  protected $primarykey = 'id';
  protected $fillable = array('customer_id','date_input','invoice_delivery','status_inv_delivery','date_inv_delivery');
  protected $hidden = ['id', 'created_at', 'updated_at'];
}