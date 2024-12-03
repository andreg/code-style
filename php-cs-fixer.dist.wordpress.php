<?php

if ( file_exists( __DIR__ . "/vendor/autoload.php" ) ) {
	require_once __DIR__ . "/vendor/autoload.php";
}

if ( file_exists( __DIR__ . "/../../autoload.php" ) ) {
	require_once __DIR__ . "/../../autoload.php";
}

return ( new PhpCsFixer\Config() )
	->setRiskyAllowed( true )
	->registerCustomFixers( [
		new \SuperDJ\SpacesInParenthesesFixer\SpacesInParenthesesFixer(),
		new \SuperDJ\SpacesInParenthesesFixer\SpaceAroundIfFixer(),
		new \SuperDJ\SpacesInParenthesesFixer\SpaceInsideSquareBracketsFixer(),
		new \SuperDJ\SpacesInParenthesesFixer\AddSpacesAroundConcatenationFixer(),
	] )
	->registerCustomFixers( new \ErickSkrauch\PhpCsFixer\Fixers() )
	->registerCustomFixers( new \PhpCsFixerCustomFixers\Fixers() )
	->setRules( [
		"@PSR12"                            => true,
		"indentation_type"                  => true,
		"array_syntax"                      => [ "syntax" => "long" ],
		"whitespace_after_comma_in_array"   => true,
		"ordered_imports"                   => [ "sort_algorithm" => "alpha" ],
		"no_unused_imports"                 => true,
		"not_operator_with_successor_space" => true,
		"trailing_comma_in_multiline"       => true,
		"phpdoc_scalar"                     => true,
		"spaces_inside_parentheses"         => [
			"space" => "single",
		],
		"unary_operator_spaces"  => true,
		"binary_operator_spaces" => [
			"operators" => [
				"=>" => "align_single_space_minimal",
				"="  => "align_single_space_minimal",
			],
		],
		"blank_line_before_statement" => [
			"statements" => [ "break", "continue", "declare", "return", "throw", "try" ],
		],
		"phpdoc_single_line_var_spacing" => true,
		"phpdoc_var_without_name"        => true,
		"class_attributes_separation"    => [
			"elements" => [
				"method" => "one",
			],
		],
		"method_argument_space" => [
			"on_multiline"                     => "ensure_fully_multiline",
			"keep_multiple_spaces_after_comma" => true,
		],
		"single_trait_insert_per_statement" => true,
		"yoda_style"                        => true,
		"curly_braces_position"             => [
			"classes_opening_brace"   => "same_line",
			"functions_opening_brace" => "same_line",
		],
		"SuperDJ/spaces_in_parentheses"           => [ "space" => "spaces" ],
		"ErickSkrauch/align_multiline_parameters" => [
			"variables" => false,
			"defaults"  => false,
		],
		"ErickSkrauch/blank_line_around_class_body" => [
			"apply_to_anonymous_classes" => false,
		],
		"ErickSkrauch/blank_line_before_return"        => true,
		"ErickSkrauch/line_break_after_statements"     => true,
		"ErickSkrauch/multiline_if_statement_braces"   => true,
		"ErickSkrauch/remove_class_name_method_usages" => true,
		"Andreg/space_around_if"                       => true,
		"Andreg/space_inside_square_brackets"          => true,
		"Andreg/space_around_concatenation"            => true,
	] )
	->setLineEnding( "\n" )
	->setIndent( "\t" );
