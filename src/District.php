<?php namespace Buchin\Indodata;
use Illuminate\Database\Eloquent\Model;

/**
* Province
*/
class District extends Model
{
	protected $table = 'town';

	public function villages()
	{
		return $this->hasMany('Buchin\Indodata\Village', 'town_id');
	}

	public function city()
	{
		return $this->belongsTo('Buchin\Indodata\City', 'regency_id');
	}
}