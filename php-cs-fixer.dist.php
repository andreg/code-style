<?php

if ( file_exists( __DIR__ . "/vendor/autoload.php" ) ) {
	require_once __DIR__ . "/vendor/autoload.php";
}

if ( file_exists( __DIR__ . "/../../autoload.php" ) ) {
	require_once __DIR__ . "/../../autoload.php";
}

return ( new PhpCsFixer\Config() )
	->setIndent( "\t" )
	->setLineEnding( "\n" )
	->registerCustomFixers( [
		new \Andreg\CodeStyle\SpaceInsideSquareBracketsFixer(),
	] )
	->setRules( require __DIR__ . "/php-cs-fixer.base.php" );
