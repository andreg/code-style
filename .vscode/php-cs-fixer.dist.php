<?php

$config = include __DIR__ . '/../php-cs-fixer.dist.php';

if ( method_exists( $config, 'setUnsupportedPhpVersionAllowed' ) ) {
	$config->setUnsupportedPhpVersionAllowed( true );
}

return $config;
