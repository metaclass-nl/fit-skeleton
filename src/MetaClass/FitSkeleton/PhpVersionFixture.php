<?php
namespace MetaClass\FitSkeleton;

use fitshelf\DoFixture;

/*
 * tests/PhpVersion.html
 */
class PhpVersionFixture extends DoFixture {

	public function phpVersion() {
		return phpversion();
	}
	
	public function comparePhpVersionByTo($operator, $value) {
		return version_compare(phpversion(), $value, $operator);
	}
}

?>