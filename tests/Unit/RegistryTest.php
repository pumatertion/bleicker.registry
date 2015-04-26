<?php

namespace Tests\Bleicker\Registry\Unit;

use Bleicker\Registry\Registry;
use Tests\Bleicker\Registry\UnitTestCase;

/**
 * Class RegistryTest
 *
 * @package Tests\Bleicker\Registry\Unit
 */
class RegistryTest extends UnitTestCase {

	protected function tearDown() {
		parent::tearDown();
		Registry::prune();
	}

	/**
	 * @test
	 */
	public function registryAdd() {
		Registry::set('foo', 'bar');
		$this->assertEquals('bar', Registry::get('foo'));
	}

	/**
	 * @test
	 */
	public function registryAddByPropertyPath() {
		Registry::set('foo.bar.baz', 'added');
		$this->assertEquals('added', Registry::get('foo.bar.baz'));
	}

	/**
	 * @test
	 */
	public function registryAddMultipleByPropertyPath() {
		Registry::set('foo.bar.baz', 'added1');
		Registry::set('bar.baz.foo', 'added2');
		$this->assertEquals('added1', Registry::get('foo.bar.baz'));
		$this->assertEquals('added2', Registry::get('bar.baz.foo'));
	}
}
