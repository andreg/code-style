<?php

namespace Andreg\CodeStyle;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Tokens;

class BlankLineAroundClassBodyFixer extends AbstractFixer {

	public function getDefinition(): FixerDefinitionInterface {
		return new \PhpCsFixer\FixerDefinition\FixerDefinition(
			'Ensure there is one blank line before and after the class body.',
			[]
		);
	}

	public function getName(): string {
		return 'Andreg/blank_line_around_class_body';
	}

	public function isCandidate( Tokens $tokens ): bool {
		return $tokens->isTokenKindFound( T_CLASS );
	}

	public function applyFix( \SplFileInfo $file, Tokens $tokens ): void {
		for ( $index = 0; $index < $tokens->count(); $index++ ) {
			if ( $tokens[ $index ]->isGivenKind( T_CLASS ) ) {
				// Find the opening and closing curly braces of the class
				$openBrace  = $tokens->getNextTokenOfKind( $index, [ '{' ] );
				$closeBrace = $tokens->findBlockEnd( Tokens::BLOCK_TYPE_CURLY_BRACE, $openBrace );

				// Ensure one blank line after opening brace
				$next       = $tokens->getNextNonWhitespace( $openBrace );

				if ( $tokens[ $next ]->isGivenKind( T_WHITESPACE ) ) {
					$content = $tokens[ $next ]->getContent();

					if ( substr_count( $content, "\n" ) < 1 ) {
						$tokens[ $next ]->setContent( "\n" . ltrim( $content ) );
					}
				}
				else {
					$tokens->insertAt( $openBrace + 1, new \PhpCsFixer\Tokenizer\Token( [ T_WHITESPACE, "\n" ] ) );
				}

				// Ensure one blank line before closing brace
				$prev       = $tokens->getPrevNonWhitespace( $closeBrace );

				if ( $tokens[ $prev ]->isGivenKind( T_WHITESPACE ) ) {
					$content = $tokens[ $prev ]->getContent();

					if ( substr_count( $content, "\n" ) < 1 ) {
						$tokens[ $prev ]->setContent( rtrim( $content ) . "\n" );
					}
				}
				else {
					$tokens->insertAt( $closeBrace, new \PhpCsFixer\Tokenizer\Token( [ T_WHITESPACE, "\n" ] ) );
				}
			}
		}
	}

}
