<?php
require_once('DoFixture.php'); //includes fit.Fixture

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