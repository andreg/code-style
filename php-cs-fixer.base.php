<?php

return [
	'align_multiline_comment'                    => [
		'comment_type' => 'phpdocs_like',
	],
	'array_indentation'                          => true,
	'array_syntax'                               => [
		'syntax' => 'short',
	],
	'assign_null_coalescing_to_coalesce_equal'   => false,
	'attribute_empty_parentheses'                => [
		'use_parentheses' => true,
	],
	'backtick_to_shell_exec'                     => true,
	'binary_operator_spaces'                     => [
		'default'   => 'single_space',
		'operators' => [
			'='  => 'align_single_space_minimal',
			'=>' => 'align_single_space_minimal_by_scope',
		],
	],
	'blank_line_after_namespace'                 => true,
	'blank_line_after_opening_tag'               => true,
	'blank_line_before_statement'                => [
		'statements' => [
			'break',
			'case',
			'continue',
			'do',
			'exit',
			'for',
			'foreach',
			'goto',
			'if',
			'include',
			'include_once',
			'phpdoc',
			'require',
			'require_once',
			'return',
			'switch',
			'throw',
			'try',
			'while',
		],
	],
	'blank_line_between_import_groups'           => false,
	'blank_lines_before_namespace'               => [
		'min_line_breaks' => 1,
	],
	'braces_position'                            => [
		'functions_opening_brace'               => 'same_line',
		'anonymous_functions_opening_brace'     => 'same_line',
		'classes_opening_brace'                 => 'same_line',
		'allow_single_line_anonymous_functions' => true,
	],
	'cast_spaces'                                => true,
	'class_attributes_separation'                => [
		'elements' => [
			'property' => 'one',
			'const'    => 'one',
			'method'   => 'one',
		],
	],
	'class_definition'                           => [
		'single_line'                  => true,
		'space_before_parenthesis'     => true,
		'inline_constructor_arguments' => false,
	],
	'class_reference_name_casing'                => true,
	'clean_namespace'                            => true,
	'combine_consecutive_issets'                 => true,
	'combine_consecutive_unsets'                 => true,
	'compact_nullable_type_declaration'          => true,
	'concat_space'                               => [ 'spacing' => 'one' ],
	'constant_case'                              => [ 'case' => 'lower' ],
	'control_structure_braces'                   => true,
	'control_structure_continuation_position'    => [
		'position' => 'next_line',
	],
	'declare_equal_normalize'                    => [
		'space' => 'none',
	],
	'declare_parentheses'                        => true,
	'echo_tag_syntax'                            => [
		'format' => 'long',
	],
	'elseif'                                     => true,
	'empty_loop_condition'                       => [
		'style' => 'while',
	],
	'encoding'                                   => true,
	'explicit_indirect_variable'                 => true,
	'explicit_string_variable'                   => true,
	'full_opening_tag'                           => true,
	'function_declaration'                       => [
		'closure_function_spacing' => 'one',
		'closure_fn_spacing'       => 'one',
	],
	'heredoc_indentation'                        => [
		'indentation' => 'start_plus_one',
	],
	'include'                                    => true,
	'increment_style'                            => [ 'style' => 'post' ],
	'indentation_type'                           => true,
	'lambda_not_used_import'                     => true,
	'line_ending'                                => true,
	'linebreak_after_opening_tag'                => true,
	'list_syntax'                                => [ 'syntax' => 'short' ],
	'lowercase_cast'                             => true,
	'lowercase_keywords'                         => true,
	'lowercase_static_reference'                 => true,
	'magic_constant_casing'                      => true,
	'magic_method_casing'                        => true,
	'method_argument_space'                      => [
		'keep_multiple_spaces_after_comma' => false,
		'on_multiline'                     => 'ensure_fully_multiline',
		'attribute_placement'              => 'ignore',
		'after_heredoc'                    => true,
	],
	'multiline_comment_opening_closing'          => true,
	'multiline_promoted_properties'              => [
		'minimum_number_of_parameters' => 1,
	],
	'new_expression_parentheses'                 => [
		'use_parentheses' => true,
	],
	'new_with_parentheses'                       => [
		'anonymous_class' => true,
		'named_class'     => true,
	],
	'no_blank_lines_after_class_opening'         => false,
	'no_blank_lines_after_phpdoc'                => true,
	'no_closing_tag'                             => true,
	'no_empty_comment'                           => true,
	'no_empty_phpdoc'                            => true,
	'no_empty_statement'                         => true,
	'no_leading_import_slash'                    => true,
	'no_leading_namespace_whitespace'            => true,
	'no_multiple_statements_per_line'            => true,
	'no_short_bool_cast'                         => true,
	'no_singleline_whitespace_before_semicolons' => true,
	'no_space_around_double_colon'               => true,
	'no_spaces_after_function_name'              => true,
	'no_spaces_around_offset'                    => [
		'positions' => [
			'outside',
		],
	],
	'no_superfluous_elseif'                      => true,
	'no_trailing_whitespace'                     => true,
	'no_trailing_whitespace_in_comment'          => true,
	'no_unused_imports'                          => true,
	'no_whitespace_in_blank_line'                => true,
	'not_operator_with_space'                    => true,
	'not_operator_with_successor_space'          => true,
	'nullable_type_declaration'                  => [
		'syntax' => 'question_mark',
	],
	'object_operator_without_whitespace'         => true,
	'ordered_imports'                            => [
		'sort_algorithm' => 'alpha',
		'imports_order'  => [ 'const', 'class', 'function' ],
	],
	'phpdoc_add_missing_param_annotation'        => [
		'only_untyped' => true,
	],
	'phpdoc_align'                               => [
		'align' => 'left',
	],
	'phpdoc_indent'                              => true,
	'return_type_declaration'                    => [
		'space_before' => 'none',
	],
	'short_scalar_cast'                          => true,
	'simplified_if_return'                       => true,
	'single_blank_line_at_eof'                   => true,
	'single_class_element_per_statement'         => [
		'elements' => [ 'property', 'const' ],
	],
	'single_import_per_statement'                => true,
	'single_line_after_imports'                  => true,
	'single_line_comment_spacing'                => true,
	'single_line_comment_style'                  => [
		'comment_types' => [ 'asterisk' ],
	],
	'single_line_empty_body'                     => true,
	'single_quote'                               => [
		'strings_containing_single_quote_chars' => false,
	],
	'single_space_around_construct'              => [
		'constructs_contain_a_single_space' => [ 'yield_from' ],
	],
	'space_after_semicolon'                      => [
		'remove_in_empty_for_expressions' => false,
	],
	'spaces_inside_parentheses'                  => [ 'space' => 'single' ],
	'switch_case_semicolon_to_colon'             => true,
	'switch_case_space'                          => true,
	'ternary_operator_spaces'                    => true,
	'ternary_to_null_coalescing'                 => true,
	'trailing_comma_in_multiline'                => [
		'elements' => [
			'arrays',
		],
	],
	'type_declaration_spaces'                    => [
		'elements' => [
			'function',
			'property',
			'constant',
		],
	],
	'types_spaces'                               => [
		'space' => 'single',
	],
	'visibility_required'                        => [
		'elements' => [
			'const',
			'method',
			'property',
		],
	],
	'whitespace_after_comma_in_array'            => [
		'ensure_single_space' => true,
	],
	'yoda_style'                                 => true,
	'Andreg/blank_line_around_class_body'        => true,
	'Andreg/blank_line_around_interface_body'    => true,
	'Andreg/blank_line_around_trait_body'        => true,
	'Andreg/space_inside_square_brackets'        => true,
];
