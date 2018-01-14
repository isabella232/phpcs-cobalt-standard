<?php
declare(strict_types=1);

namespace CobaltStandardTest;

use PHPUnit\Framework\TestCase;

class RiskyMagicMethodSniffTest extends TestCase {
	public function testRiskyMagicMethodsSniff() {
		$fixtureFile = __DIR__ . '/fixture.php';
		$sniffFiles = [
			__DIR__ . '/../../../CobaltStandard/Sniffs/MagicMethods/RiskyMagicMethodSniff.php',
		];
		$helper = new SniffTestHelper();
		$phpcsFile = $helper->prepareLocalFileForSniffs($sniffFiles, $fixtureFile);
		$phpcsFile->process();
		$lines = $helper->getWarningLineNumbersFromFile($phpcsFile);
		$this->assertEquals([32, 36, 42], $lines);
	}
}
