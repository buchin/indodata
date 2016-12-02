<?php namespace Buchin\Indodata;
use Illuminate\Database\Eloquent\Model;
/**
* Province
*/
class City extends Model
{
	protected $table = 'regency';

	public function districts()
	{
		return $this->hasMany('Buchin\Indodata\District', 'regency_id');
	}

	public function province()
	{
		return $this->belongsTo('Buchin\Indodata\Province');
	}
}