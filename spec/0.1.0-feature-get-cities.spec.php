<?php 
use Buchin\Indodata\Capsule;
use Buchin\Indodata\Province;
use Buchin\Indodata\City;
use Buchin\Indodata\District;
use Buchin\Indodata\Village;

describe('Indodata', function(){
	$this->capsule = new Capsule;

	describe('count', function(){
		it('returns all record', function(){
			expect(Province::count())->toBe(33);
			expect(City::count())->toBe(497);
			expect(District::count())->toBe(6928);
			expect(Village::count())->toBe(81508);
		});
	});

	describe('relationships', function(){
		describe('province', function(){
			it('has many cities', function(){
				$province = Province::first();
				expect($province->cities)->not->toBeNull();
			});
		});
		describe('city', function(){
			it('has many districts', function(){
				$city = City::first();
				expect($city->districts)->not->toBeNull();
			});
		});
		describe('district', function(){
			it('has many villages', function(){
				$district = District::first();
				expect($district->villages)->not->toBeNull();
			});
		});
		describe('village', function(){
			$this->village = Village::first();
			it('belongs to district', function(){
				expect($this->village->district)->not->toBeNull();
				expect($this->village->district->city)->not->toBeNull();
				expect($this->village->district->city->province)->not->toBeNull();
			});
		});
	});
});