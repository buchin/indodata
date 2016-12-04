<?php namespace Buchin\Indodata;
use Illuminate\Database\Eloquent\Model;

/**
* Province
*/
class Province extends Model
{
	use IndodataTrait;
	protected $table = 'province';

	public function cities()
	{
		return $this->hasMany('Buchin\Indodata\City');
	}
}