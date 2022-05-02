<?php

class StringCalculator
{
    function calculate(?string $arg = NULL, ?string $separator = NULL): int {
        if (!$arg) {
            return 0;
        }

        if ($separator) {
            $words = explode($separator, $arg);
            $sum = 0;
            foreach ($words as $word) {
                $sum += $this->getNumbers($word);
            }
            return $sum;
        }

        return $this->getNumbers($arg);
    }

    private function getNumbers($word): int {
        return (int) preg_replace('/[^0-9]/', '', $word);
    }

}
