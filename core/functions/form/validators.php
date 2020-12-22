<?php

// //////////////////////////////
// [1] FORM VALIDATORS
// //////////////////////////////

/**
 * Check if field values are the same
 *
 * @param $form_values
 * @param array $form
 * @param array $params
 * @return bool
 */
function validate_fields_match($form_values, array &$form, array $params): bool
{
    foreach ($params as $field_index) {
        if ($form_values[$params[0]] !== $form_values[$field_index]) {
            $form['fields'][$field_index]['error'] = strtr('Field does not match with @field field', [
                '@field' => $form['fields'][$params[0]]['label']
            ]);

            return false;
        }
    }

    return true;
}

// //////////////////////////////
// [2] FIELD VALIDATORS
// //////////////////////////////

/**
 * Check if field is not empty
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_field_not_empty(string $field_value, array &$field): bool
{

    if ($field_value == '') {
        $field['error'] = 'Gamta nemėgsta tuštumos, lašinuk.';
        return false;
    }

    return true;
}

/**
 * Chef if field contains space
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_field_contains_space(string $field_value, array &$field): bool
{
    if (str_word_count(trim($field_value)) < 2) {
        $field['error'] = 'Field must contain space';
        return false;
    }

    return true;
}

/**
 * Chef if number is within the min and max range.
 *
 * @param string $field_value
 * @param array $field
 * @param array $params
 * @return bool
 */
function validate_field_range(string $field_value, array &$field, array $params): bool
{
    if ($field_value < $params['min'] || $field_value > $params['max']) {
        $field['error'] = strtr('Insert a number between @min - @max!', [
            '@min' => $params['min'],
            '@max' => $params['max']
        ]);

        return false;
    }

    return true;
}

/**
 * Check if input is numeric
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_numeric(string $field_value, array &$field): bool
{
    if (!is_numeric($field_value)) {
        $field['error'] = 'Field input must be numeric';

        return false;
    };

    return true;
}

function validate_not_numeric(string $field_value, array &$field): bool
{
    if (preg_match('~[0-9]~', $field_value)) {
        $field['error'] = 'Field input can not contain numbers';

        return false;
    }

    return true;
}

function validate_length(string $field_value, array &$field, array $params): bool
{
    if (strlen($field_value) < ($params['min'] ?? 0) || strlen($field_value) > $params['max']) {
        $field['error'] = strtr('Field input must be between @min and @max symbols!', [
            '@min' => $params['min'] ?? 0,
            '@max' => $params['max'],
        ]);

        return false;
    }

    return true;
}

/**
 * Check if provided email is in correct format
 *
 * @param string $field_value
 * @param array $field
 * @return bool
 */
function validate_email(string $field_value, array &$field): bool
{
    if (!preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/', $field_value)) {
        $field['error'] = 'Invalid email format';

        return false;
    }

    return true;
}
