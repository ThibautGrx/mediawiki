<?php

namespace MediaWiki\Logger\Monolog;

/**
 * @covers \MediaWiki\Logger\Monolog\CeeFormatter
 */
class CeeFormatterTest extends \PHPUnit\Framework\TestCase {
	public function testV1() {
		$ls_formatter = new LogstashFormatter( 'app', 'system', null, 'ctx_', LogstashFormatter::V1 );
		$cee_formatter = new CeeFormatter( 'app', 'system', null, 'ctx_', LogstashFormatter::V1 );
		$record = [ 'extra' => [ 'url' => 1 ], 'context' => [ 'url' => 2 ] ];
		$this->assertSame(
			$cee_formatter->format( $record ),
			"@cee: " . $ls_formatter->format( $record ) );
	}
}
