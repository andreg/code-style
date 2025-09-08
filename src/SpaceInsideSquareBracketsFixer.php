<?php

namespace Andreg\CodeStyle;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\CT;
use PhpCsFixer\Tokenizer\Token;
use PhpCsFixer\Tokenizer\Tokens;

class SpaceInsideSquareBracketsFixer extends AbstractFixer {

	public function getDefinition(): FixerDefinitionInterface {
		return new \PhpCsFixer\FixerDefinition\FixerDefinition(
			'Ensure there are spaces inside square brackets token.',
			[]
		);
	}

	public function getName(): string {
		return 'Andreg/space_inside_square_brackets';
	}

	public function isCandidate( Tokens $tokens ): bool {
		return
			$tokens->isTokenKindFound( CT::T_ARRAY_SQUARE_BRACE_OPEN ) ||
			$tokens->isTokenKindFound( CT::T_ARRAY_SQUARE_BRACE_CLOSE ) ||
			$tokens->isTokenKindFound( '[' ) ||
			$tokens->isTokenKindFound( T_ATTRIBUTE ) ||
			$tokens->isTokenKindFound( ']' );
	}

	public function applyFix( \SplFileInfo $file, Tokens $tokens ): void {
		foreach ( $tokens as $index => $token ) {
			// Skip if not a square bracket or attribute token
			if (
				! $token->isGivenKind( CT::T_ARRAY_SQUARE_BRACE_OPEN ) &&
				! $token->isGivenKind( CT::T_ARRAY_SQUARE_BRACE_CLOSE ) &&
				'[' !== $token->getContent() &&
				! $token->isGivenKind( T_ATTRIBUTE ) &&
				']' !== $token->getContent()
			) {
				continue;
			}

			// Handle opening brackets (array or attribute)
			if ( $this->isOpeningBracket( $token ) ) {
				$this->handleOpeningBracket( $tokens, $index );
			}

			// Handle closing brackets (array or attribute)
			if ( $this->isClosingBracket( $token ) ) {
				$this->handleClosingBracket( $tokens, $index );
			}
		}
	}

	private function isOpeningBracket( Token $token ): bool {
		return $token->isGivenKind( CT::T_ARRAY_SQUARE_BRACE_OPEN ) ||
			   $token->isGivenKind( T_ATTRIBUTE ) ||
			   '[' === $token->getContent();
	}

	private function isClosingBracket( Token $token ): bool {
		return $token->isGivenKind( CT::T_ARRAY_SQUARE_BRACE_CLOSE ) ||
			   ']' === $token->getContent();
	}

	private function handleOpeningBracket( Tokens $tokens, int $index ): void {
		// Skip if next token doesn't exist
		if ( ! isset( $tokens[ $index + 1 ] ) ) {
			return;
		}

		$nextToken = $tokens[ $index + 1 ];

		// Don't add space if already has whitespace or if it's an empty array/attribute
		if ( $nextToken->isWhitespace() || $this->isClosingBracket( $nextToken ) ) {
			return;
		}

		// Only add space for single-line constructs
		if ( $this->isSingleLine( $tokens, $index ) ) {
			$tokens->insertAt( $index + 1, new Token( [ T_WHITESPACE, ' ' ] ) );
		}
	}

	private function handleClosingBracket( Tokens $tokens, int $index ): void {
		// Skip if previous token doesn't exist
		if ( ! isset( $tokens[ $index - 1 ] ) ) {
			return;
		}

		$prevToken = $tokens[ $index - 1 ];

		// Don't add space if already has whitespace or if it's an empty array/attribute
		if ( $prevToken->isWhitespace() || $this->isOpeningBracket( $prevToken ) ) {
			return;
		}

		// Only add space for single-line constructs
		if ( $this->isSingleLine( $tokens, $index ) ) {
			$tokens->insertAt( $index, new Token( [ T_WHITESPACE, ' ' ] ) );
		}
	}

	private function isSingleLine( Tokens $tokens, int $bracketIndex ): bool {
		$currentToken = $tokens[ $bracketIndex ];

		// Find the matching bracket
		if ( $this->isOpeningBracket( $currentToken ) ) {
			$matchingIndex = $this->findMatchingClosingBracket( $tokens, $bracketIndex );
		}
		else {
			$matchingIndex = $this->findMatchingOpeningBracket( $tokens, $bracketIndex );
		}

		if ( null === $matchingIndex ) {
			return false;
		}

		$startIndex = min( $bracketIndex, $matchingIndex );
		$endIndex   = max( $bracketIndex, $matchingIndex );

		// Check if there are any newlines between the brackets
		for ( $i = $startIndex; $i <= $endIndex; $i++ ) {
			if ( isset( $tokens[ $i ] ) && $tokens[ $i ]->isWhitespace() && false !== strpos( $tokens[ $i ]->getContent(), "\n" ) ) {
				return false;
			}
		}

		return true;
	}

	private function findMatchingClosingBracket( Tokens $tokens, int $openIndex ): ?int {
		$depth = 1;
		$count = count( $tokens );

		for ( $i = $openIndex + 1; $i < $count; $i++ ) {
			$token = $tokens[ $i ];

			if ( $this->isOpeningBracket( $token ) ) {
				$depth++;
			}
			elseif ( $this->isClosingBracket( $token ) ) {
				$depth--;

				if ( 0 === $depth ) {
					return $i;
				}
			}
		}

		return null;
	}

	private function findMatchingOpeningBracket( Tokens $tokens, int $closeIndex ): ?int {
		$depth = 1;

		for ( $i = $closeIndex - 1; $i >= 0; $i-- ) {
			$token = $tokens[ $i ];

			if ( $this->isClosingBracket( $token ) ) {
				$depth++;
			}
			elseif ( $this->isOpeningBracket( $token ) ) {
				$depth--;

				if ( 0 === $depth ) {
					return $i;
				}
			}
		}

		return null;
	}

}
