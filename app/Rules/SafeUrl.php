<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SafeUrl implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            return;
        }

        // Allow relative paths starting with /
        if (str_starts_with($value, '/')) {
            return;
        }

        // Allow anchor fragments only
        if (str_starts_with($value, '#')) {
            return;
        }

        // Parse the URL
        $parsed = parse_url($value);

        // If no scheme, it's a relative path - allow it
        if (!isset($parsed['scheme'])) {
            return;
        }

        // Only allow safe protocols
        $allowedSchemes = ['http', 'https', 'mailto', 'tel'];
        if (!in_array(strtolower($parsed['scheme']), $allowedSchemes)) {
            $fail('The :attribute must use a safe protocol (http, https, mailto, tel).');
            return;
        }

        // For http/https, validate the URL format
        if (in_array(strtolower($parsed['scheme']), ['http', 'https'])) {
            if (!filter_var($value, FILTER_VALIDATE_URL)) {
                $fail('The :attribute must be a valid URL.');
                return;
            }
        }
    }
}
