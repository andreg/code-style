<?php

namespace Andreg\CodeStyle;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Tokens;

class BlankLineAroundInterfaceBodyFixer extends AbstractFixer {

	public function getDefinition(): FixerDefinitionInterface {
		return new \PhpCsFixer\FixerDefinition\FixerDefinition(
			'Ensure there is one blank line before and after the interface body.',
			[]
		);
	}

	public function getName(): string {
		return 'Andreg/blank_line_around_interface_body';
	}

	public function isCandidate( Tokens $tokens ): bool {
		return $tokens->isTokenKindFound( T_INTERFACE );
	}

	public function applyFix( \SplFileInfo $file, Tokens $tokens ): void {
		for ( $index = 0; $index < $tokens->count(); $index++ ) {
			if ( $tokens[ $index ]->isGivenKind( T_INTERFACE ) ) {
				// Find the opening and closing curly braces of the interface
				$openBrace  = $tokens->getNextTokenOfKind( $index, [ '{' ] );
				$closeBrace = $tokens->findBlockEnd( Tokens::BLOCK_TYPE_CURLY_BRACE, $openBrace );

				// Ensure exactly one blank line after opening brace
				$nextIndex = $openBrace + 1;

				if ( $nextIndex < $tokens->count() && $tokens[ $nextIndex ]->isWhitespace() ) {
					$content  = $tokens[ $nextIndex ]->getContent();
					$newlines = substr_count( $content, "\n" );

					// We want exactly 2 newlines (one for the line break, one for the blank line)
					if ( 2 !== $newlines ) {
						// Find the indentation after the last newline
						$lastNewlinePos       = strrpos( $content, "\n" );
						$indentation          = false !== $lastNewlinePos ? substr( $content, $lastNewlinePos + 1 ) : '';
						$tokens[ $nextIndex ] = new \PhpCsFixer\Tokenizer\Token( [ T_WHITESPACE, "\n\n" . $indentation ] );
					}
				}
				else {
					$tokens->insertAt( $nextIndex, new \PhpCsFixer\Tokenizer\Token( [ T_WHITESPACE, "\n\n\t" ] ) );
				}

				// Ensure exactly one blank line before closing brace
				$prevIndex = $closeBrace - 1;

				if ( $prevIndex >= 0 && $tokens[ $prevIndex ]->isWhitespace() ) {
					$content  = $tokens[ $prevIndex ]->getContent();
					$newlines = substr_count( $content, "\n" );

					// We want exactly 2 newlines (one for the line break, one for the blank line)
					if ( 2 !== $newlines ) {
						// Find the indentation before the closing brace (should be no indentation)
						$tokens[ $prevIndex ] = new \PhpCsFixer\Tokenizer\Token( [ T_WHITESPACE, "\n\n" ] );
					}
				}
				else {
					$tokens->insertAt( $closeBrace, new \PhpCsFixer\Tokenizer\Token( [ T_WHITESPACE, "\n\n" ] ) );
				}
			}
		}
	}

}
