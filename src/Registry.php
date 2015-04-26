<?php

namespace Bleicker\Registry;

use Bleicker\Registry\Utility\Arrays;

/**
 * Class Registry
 *
 * @package Bleicker\Framework
 */
class Registry implements RegistryInterface {

	/**
	 * @var array
	 */
	public static $storage = [];

	/**
	 * @param string $path
	 * @param mixed|null $value
	 * @return void
	 */
	public static function set($path, $value = NULL) {
		Arrays::setValueByPath(static::$storage, $path, $value);
	}

	/**
	 * @param string $path
	 * @return mixed
	 */
	public static function get($path) {
		return Arrays::getValueByPath(static::$storage, $path);
	}

	/**
	 * @return void
	 */
	public static function prune() {
		static::$storage = [];
	}
}
