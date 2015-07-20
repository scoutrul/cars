<?php namespace App;

class Singleton {

	private static $types;

	private static $specs;

	private static $requestsCount = 0;

	private static $responsesCount = 0;

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
	
	public static function requestsCount() {
		return self::$requestsCount;
	}

	public static function responsesCount() {
		return self::$responsesCount;
	}

	public static function set($name, $value) {
		self::$$name = $value;
	}

}