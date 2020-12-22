<?php

// //////////////////////////////
// [1] FORM VALIDATORS
// //////////////////////////////

function validate_fields_match($form_values, array &$form, array $params): bool
{
    foreach ($params as $field_index) {
        if ($form_values[$params[0]] !== $form_values[$field_index]) {
            $form['fields'][$field_index]['error'] = strtr('Nu nesutampa @field, nu', [
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

function validate_field_not_empty(string $field_value, array &$field): bool
{

    if ($field_value == '') {
        $field['error'] = 'Gamta nemėgsta tuštumos, lašinuk.';
        return false;
    }

    return true;
}

function validate_field_contains_space(string $field_value, array &$field): bool
{
    if (str_word_count(trim($field_value)) < 2) {
        $field['error'] = 'Reikia truputi erdvės';
        return false;
    }

    return true;
}

function validate_field_range(string $field_value, array &$field, array $params): bool
{
    if ($field_value < $params['min'] || $field_value > $params['max']) {
        $field['error'] = strtr('Tarp @min - @max, lašinuk', [
            '@min' => $params['min'],
            '@max' => $params['max']
        ]);

        return false;
    }

    return true;
}

function validate_not_numeric(string $field_value, array &$field): bool
{
    if (preg_match('~[0-9]~', $field_value)) {
        $field['error'] = 'Lašinukas tiksliukas mat';

        return false;
    }

    return true;
}

function validate_length(string $field_value, array &$field, array $params): bool
{
    if (strlen($field_value) < ($params['min'] ?? 0) || strlen($field_value) > $params['max']) {
        $field['error'] = strtr('Tarp @min and @max, lašinuk', [
            '@min' => $params['min'] ?? 0,
            '@max' => $params['max'],
        ]);

        return false;
    }

    return true;
}

function validate_email(string $field_value, array &$field): bool
{
    if (!preg_match('/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/', $field_value)) {
        $field['error'] = 'Rimtai?';

        return false;
    }

    return true;
}
