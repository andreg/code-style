<?php

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

if ( file_exists( __DIR__ . '/../../autoload.php' ) ) {
	require_once __DIR__ . '/../../autoload.php';
}

return ( new PhpCsFixer\Config() )
	->setIndent( "\t" )
	->setLineEnding( "\n" )
	->setParallelConfig( PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect() )
	->registerCustomFixers( [
		new \Andreg\CodeStyle\SpaceInsideSquareBracketsFixer(),
		new \Andreg\CodeStyle\BlankLineAroundClassBodyFixer(),
		new \Andreg\CodeStyle\BlankLineAroundInterfaceBodyFixer(),
		new \Andreg\CodeStyle\BlankLineAroundTraitBodyFixer(),
		new \Andreg\CodeStyle\BlankLineAroundEnumBodyFixer(),
	] )
	->setRules( require __DIR__ . '/php-cs-fixer.base.php' );
