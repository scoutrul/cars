<?php namespace App;

class Singleton {

	private static $types;

	private static $specs;

	private static $ctypes;

	public static function types() {

		if(self::$types)
			return self::$types;
		else {
			self::$types = \App\Type::all();
			return self::$types;
		}

	}

	public static function specs() {

		if(self::$specs)
			return self::$specs;
		else {
			self::$specs = \App\Spec::all();
			return self::$specs;
		}

	}

	public static function ctypes() {

		if(self::$ctypes)
			return self::$ctypes;
		else {
			self::$ctypes = \App\CType::all();
			return self::$ctypes;
		}

	}

	public static function set($name, $value) {
		self::$$name = $value;
	}

}