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

	private function __construct() {
	}

	private function __clone() {
	}

	/**
	 * @param string $path
	 * @param mixed $value
	 * @return static
	 */
	public static function set($path, $value) {
		Arrays::setValueByPath(static::$storage, $path, $value);
		return new static;
	}

	/**
	 * @param string $path
	 * @return static
	 */
	public static function remove($path) {
		Arrays::unsetValueByPath(static::$storage, $path);
		return new static;
	}

	/**
	 * @param string $path
	 * @return mixed
	 */
	public static function get($path) {
		return Arrays::getValueByPath(static::$storage, $path);
	}

	/**
	 * @return static
	 */
	public static function instance() {
		return new static();
	}

	/**
	 * @return static
	 */
	public static function prune() {
		static::$storage = [];
		return new static;
	}
}
