<?php
/**
 * Class QRStringJSONTest
 *
 * @created      11.12.2021
 * @author       smiley <smiley@chillerlan.net>
 * @copyright    2021 smiley
 * @license      MIT
 */

namespace chillerlan\QRCodeTest\Output;

use chillerlan\QRCode\Output\QROutputInterface;
use function extension_loaded;

/**
 *
 */
final class QRStringJSONTest extends QRStringTestAbstract{

	protected string $type = QROutputInterface::STRING_JSON;

	/**
	 * @inheritDoc
	 */
	protected function setUp():void{
		// just in case someone's running this on some weird distro that's been compiled without ext-json
		if(!extension_loaded('json')){
			$this::markTestSkipped('ext-json not loaded');
		}

		parent::setUp();
	}


	public function testSetModuleValues():void{
		/** @noinspection PhpUnitTestFailedLineInspection */
		$this::markTestSkipped('N/A (JSON test)');
	}

}
