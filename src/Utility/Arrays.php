<?php
namespace Bleicker\Registry\Utility;

/**
 * Class Arrays
 *
 * @package Bleicker\Registry\Utility
 */
class Arrays {

	const PATHSEPARATOR = '.';

	/**
	 * @param array|\ArrayAccess &$subject
	 * @param string $path The path with keys seperated by .
	 * @return mixed
	 */
	static public function getValueByPath(array &$subject, $path) {
		$path = explode('.', $path);
		$key = array_shift($path);

		if (!array_key_exists($key, $subject)) {
			return NULL;
		}

		if (count($path) > 0) {
			return (is_array($subject[$key])) ? self::getValueByPath($subject[$key], implode(static::PATHSEPARATOR, $path)) : NULL;
		}

		return $subject[$key];
	}

	/**
	 * @param array|\ArrayAccess $subject
	 * @param string $path The path with keys seperated by . (foo.bar.baz)
	 * @param mixed $value
	 * @return void
	 */
	static public function setValueByPath(&$subject, $path, $value = NULL) {
		$path = explode('.', $path);
		$key = array_shift($path);
		if (count($path) === 0) {
			$subject[$key] = $value;
		} else {
			if (!array_key_exists($key, $subject) || !is_array($subject[$key])) {
				$subject[$key] = array();
			}
			self::setValueByPath($subject[$key], implode(static::PATHSEPARATOR, $path), $value);
		}
	}

	/**
	 * @param array|\ArrayAccess $subject
	 * @param string $path The path with keys seperated by . (foo.bar.baz)
	 * @return void
	 */
	static public function unsetValueByPath(&$subject, $path) {
		$path = explode('.', $path);
		$key = array_shift($path);
		if(count($path) > 0){
			self::unsetValueByPath($subject[$key], implode(static::PATHSEPARATOR, $path));
		}else{
			unset($subject[$key]);
		}
	}
}
