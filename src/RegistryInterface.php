<?php

namespace Bleicker\Registry;

/**
 * Class RegistryInterface
 *
 * @package Bleicker\Framework
 */
interface RegistryInterface {

	/**
	 * @param string $path
	 * @param mixed $value
	 * @return static
	 */
	public static function set($path, $value);

	/**
	 * @param string $path
	 * @return static
	 */
	public static function remove($path);

	/**
	 * @param string $path
	 * @return mixed
	 */
	public static function get($path);

	/**
	 * @return static
	 */
	public static function prune();

	/**
	 * @return static
	 */
	public static function instance();
}
