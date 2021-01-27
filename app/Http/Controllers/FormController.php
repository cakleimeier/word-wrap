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
        # NOTE: not using `wordwrap` function because that might be cheating?
        $string = $request->string ? (string) $request->string : null;
        $number = $request->number ? (int) $request->number : null;
        $response = '';

        # If there is no string or number, return nothing
        if (!$string || !$number) {
            $reponse = 'Missing parameter';
        } elseif ((gettype($string) != 'string') || (gettype($number) != 'integer')) {
            $response = 'Invalid parameter';
        }

        # If the string is too short to be split, just return it
        if (strlen($string) <= $number) {
            $response = $string;
        } else {
            # Split the string at the whitespace
            $splitString = explode(' ', $string);
            # Create the new string array
            $newStringArray = [];
            # Keep track of the loop index
            $loopIndex = 0;
            # Keep track of the total line length
            $lineLength = 0;
            # Keep track of the number of lines
            $totalLines = 0;

            # Create the split array, newString
            foreach ($splitString as $key => $value) {
                # Get the length of the current word
                $wordLength = strlen($value);

                # Calculate the total length of the line,
                # including the spaces between words, as
                # represented by loopIndex
                $totalLength = $wordLength + $lineLength + $loopIndex;

                # If that's not too long, add it to the new string
                if ($totalLength <= $number) {
                    if (!array_key_exists($totalLines, $newStringArray)) {
                        $newStringArray[$totalLines] = [];
                    }
                    array_push($newStringArray[$totalLines], $splitString[$key]);

                    $loopIndex++;
                    $lineLength = $totalLength;

                # If it is too long, add it to the next array
                # and recalculate variables
                } else {
                    $totalLines++;

                    $newStringArray[$totalLines] = [];
                    array_push($newStringArray[$totalLines], $splitString[$key]);

                    $loopIndex = 1;
                    $lineLength = $wordLength + $loopIndex;
                }
            }

            # Create the new string by adding each word
            # and then each line to the string
            $newString = '';
            foreach ($newStringArray as $lineKey => $lineElement) {
                foreach ($lineElement as $wordKey => $wordElement) {
                    $newString .= $wordElement;

                    # If this isn't the last word in the line,
                    # add a space after it
                    if ($wordKey != array_key_last($lineElement)) {
                        $newString .= ' ';
                    }
                }

                # If this isn't the last line, add a break
                if ($lineKey != array_key_last($newStringArray)) {
                    $newString .= '<br>';
                }
            }

            $response = $newString;
        }

        return ['response' => $response];
    }
}