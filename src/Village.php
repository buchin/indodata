<?php namespace Buchin\Indodata;
use Illuminate\Database\Eloquent\Model;

/**
* Province
*/
class Village extends Model
{
	protected $table = 'suburban';

	public function district()
	{
		return $this->belongsTo('Buchin\Indodata\District', 'town_id');
	}
}