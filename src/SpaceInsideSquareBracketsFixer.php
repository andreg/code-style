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
			if (
				! $token->isGivenKind( CT::T_ARRAY_SQUARE_BRACE_OPEN ) &&
				! $token->isGivenKind( CT::T_ARRAY_SQUARE_BRACE_CLOSE ) &&
				'[' == ! $token->getContent() &&
				T_ATTRIBUTE == ! $token->getId() &&
				']' == ! $token->getContent()
			) {
				continue;
			}

			if ( $token->isGivenKind( CT::T_ARRAY_SQUARE_BRACE_OPEN ) || 387 == $token->getId() || '[' == $token->getContent() ) {
				if (
					! $tokens[ $index + 1 ]->isWhitespace() &&
					! (
						$tokens[ $index + 1 ]->isGivenKind( CT::T_ARRAY_SQUARE_BRACE_CLOSE ) ||
						']' == $tokens[ $index + 1 ]->getContent()
					)
				) {
					$tokens->insertAt( $index + 1, new Token( [ T_WHITESPACE, ' ' ] ) );
				}
			}

			if ( $token->isGivenKind( CT::T_ARRAY_SQUARE_BRACE_CLOSE ) || ']' == $token->getContent() ) {
				if (
					! $tokens[ $index - 1 ]->isWhitespace() &&
					! (
						$tokens[ $index - 1 ]->isGivenKind( CT::T_ARRAY_SQUARE_BRACE_OPEN ) ||
						'[' == $tokens[ $index - 1 ]->getContent()
					)
				) {
					$tokens->insertAt( $index, new Token( [ T_WHITESPACE, ' ' ] ) );
				}
			}
		}
	}

}
