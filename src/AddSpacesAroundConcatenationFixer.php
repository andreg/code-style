<?php

namespace SuperDJ\SpacesInParenthesesFixer;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\FixerDefinition\CodeSample;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;

class AddSpacesAroundConcatenationFixer extends AbstractFixer {

	public function getName(): string {
		return 'Andreg/space_around_concatenation';
	}

	public function getDefinition(): FixerDefinition {
		return new FixerDefinition(
			'Ensure there are single spaces around concatenation (.) operators.',
			[ new CodeSample( '<?php $a = "Hello".$b."World";' ) ]
		);
	}

	public function isCandidate( Tokens $tokens ): bool {
		// This fixer will always be a candidate, as it's targeting the dot `.` character
		return true;
	}

	protected function applyFix( \SplFileInfo $file, Tokens $tokens ): void {
		// Iterate through all tokens
		foreach ( $tokens as $index => $token ) {
			// Check if the token is a concatenation dot (.)
			if ( '.' === $token->getContent() ) {
				$prevIndex = $index - 1;
				$nextIndex = $index + 1;

				// Handle the previous token (add space after it if necessary)
				if ( ! $tokens[ $prevIndex ]->isWhitespace() ) {
					// Insert a space before the concatenation dot
					$tokens->insertAt( $index, new Token( [ T_WHITESPACE, ' ' ] ) );
					$index++; // Shift index since we just inserted a token
				} elseif ( $tokens[ $prevIndex ]->isWhitespace() && ' ' !== $tokens[ $prevIndex ]->getContent() ) {
					// Normalize to exactly one space before the dot
					$tokens[ $prevIndex ] = new Token( [ T_WHITESPACE, ' ' ] );
				}

				// Handle the next token (add space before it if necessary)
				if ( ! $tokens[ $nextIndex ]->isWhitespace() ) {
					// Insert a space after the concatenation dot
					$tokens->insertAt( $nextIndex, new Token( [ T_WHITESPACE, ' ' ] ) );
				} elseif ( $tokens[ $nextIndex ]->isWhitespace() && ' ' !== $tokens[ $nextIndex ]->getContent() ) {
					// Normalize to exactly one space after the dot
					$tokens[ $nextIndex ] = new Token( [ T_WHITESPACE, ' ' ] );
				}
			}
		}
	}

}
