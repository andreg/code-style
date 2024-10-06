import globals from "globals";


export default [
  {
	files: ["**/*.js"],
	languageOptions: {sourceType: "script"},
	rules: {
		"space-in-parens": ["error", "always"],
		"object-curly-spacing": ["error", "always"],
		"array-bracket-spacing": ["error", "always"],
		"keyword-spacing": ["error", { "before": true, "after": true }],
		"space-before-function-paren": ["error", "always"],
		"indent": ["error", "tab"],
		"key-spacing": ["error", { "beforeColon": false, "afterColon": true }],
		"padding-line-between-statements": ["error", { blankLine: "always", prev: "*", next: "return" }]
	}
  },
  {languageOptions: { globals: globals.browser }},
];