<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoModel extends Model
{
    protected $table = 'tipo';
	protected $primaryKey = 'Tip_Codigo';
	public $incrementing = true;
	public $timestamps = false;
}
