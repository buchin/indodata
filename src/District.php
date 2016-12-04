<?php namespace Buchin\Indodata;
use Illuminate\Database\Eloquent\Model;

/**
* Province
*/
class District extends Model
{
	use IndodataTrait;
	
	protected $table = 'town';

	public function villages()
	{
		return $this->hasMany('Buchin\Indodata\Village', 'town_id');
	}

	public function city()
	{
		return $this->belongsTo('Buchin\Indodata\City', 'regency_id');
	}

	public function getFullAddressAttribute()
	{
		$loc = [ucwords(strtolower($this->name)), ucwords(strtolower($this->city->name)), ucwords(strtolower($this->city->province->name))];

		return implode(', ', $loc);
	}
}