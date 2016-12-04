<?php namespace Buchin\Indodata;

trait IndodataTrait{
	
	public function getNameAttribute($value)
	{
		return ucwords(strtolower($value));
	}
}