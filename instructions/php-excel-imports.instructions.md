---
applyTo: '*.php*'
---

# PHP Excel Imports Instructions

This file contains instructions for importing Excel files in PHP. It is designed to help developers understand how to handle Excel imports effectively.

- When importing Excel files, ensure you have the necessary libraries installed, such as `PhpSpreadsheet` or `PHPExcel`.
- Identify the format of the Excel file and where the actual data starts from within the file. Real data may not always start from the first row or column.
- The file may not always be in english, so look for the correct column headers or data structure.
- Some data columns may contain special characters or formats, so be prepared to handle these cases.
- Some data columns may be dates: in that case, ensure that they're read as date strings first, and then converted to a Carbon\Carbon instance if needed.
- If possible, make sure to handle duplicate entries (eg. running the import twice should not create duplicate records).
- For money amounts, do not multiply by 100 or convert to cents directly in the import logic, if not told explicitly.