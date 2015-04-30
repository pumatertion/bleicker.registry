<?php

namespace Tests\Bleicker\Registry\Unit\Utility;

use Bleicker\Registry\Utility\Arrays;
use Tests\Bleicker\Registry\UnitTestCase;

/**
 * Class ArraysTest
 *
 * @package Tests\Bleicker\Registry\Unit\Utility
 */
class ArraysTest extends UnitTestCase {

	/**
	 * @test
	 */
	public function setValueByPath() {
		$array = [];
		Arrays::setValueByPath($array, 'foo.bar', 'baz');
		$expected = ['foo' => ['bar' => 'baz']];
		$this->assertTrue($array == $expected);
		$this->assertEquals('baz', Arrays::getValueByPath($array, 'foo.bar'));
	}

	/**
	 * @test
	 */
	public function unsetValueByPath(){
		$array = [];
		Arrays::setValueByPath($array, 'foo.bar.baz', 'hello world');
		Arrays::setValueByPath($array, 'foo.bar.foo', 'hello world');
		Arrays::unsetValueByPath($array, 'foo.bar.baz');
		$this->assertNull(Arrays::getValueByPath($array, 'foo.bar.baz'));
		$this->assertNotNull(Arrays::getValueByPath($array, 'foo.bar.foo'));
	}
}
