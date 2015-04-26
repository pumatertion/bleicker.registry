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
	 * @return void
	 */
	public static function set($path, $value = NULL);

	/**
	 * @param string $path
	 * @return mixed
	 */
	public static function get($path);

	/**
	 * @return void
	 */
	public static function prune();
}
