<?php namespace Buchin\Indodata;
use Illuminate\Database\Eloquent\Model;

/**
* Province
*/
class Village extends Model
{
	use IndodataTrait;
	
	protected $table = 'suburban';

	public function district()
	{
		return $this->belongsTo('Buchin\Indodata\District', 'town_id');
	}
}