<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Create a wrapped string from a submitted form.
     * The string should be wrapped at the last whitespace
     * character in the string before the indicated position.
     * @param Request $request
     * @return string
     */
    public function createWrappedString(Request $request)
    {
        $string = $request->string ? (string) $request->string : null;
        $number = $request->number ? (int) $request->number : null;
        $response = '';

        # If there is no string or number, return nothing
        if (!$string || !$number) {
            $reponse = 'Missing parameter';
            return ['response' => $response];
        } elseif ((gettype($string) != 'string') || (gettype($number) != 'integer')) {
            $response = 'Invalid parameter';
            return ['response' => $response];
        }

        # If the string is too short to be split, just return it
        if (strlen($string) <= $number) {
            return ['response' => $string];
        }
    }
}