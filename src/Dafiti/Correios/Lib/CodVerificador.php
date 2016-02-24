<?php

namespace Dafiti\Correios\Lib;

/**
 * Calculates the verification code according to the documentation
 * link: {@link http://www.corporativo.correios.com.br/encomendas/sigepweb/doc/Manual_de_Implementacao_do_Web_Service_SIGEPWEB_Logistica_Reversa.pdf}
 * i.
 *
 * @author Flávio Briz <flavio.briz@dafiti.com.br>
 * @license MIT
 */
class CodVerificador
{
    public static function calculate($num)
    {
        $multipliers = [8, 6, 4, 2, 3, 5, 9, 7];
        $verifyDigit;

        if (strlen($num) !== 8 || !is_string($num)) {
            throw new \InvalidArgumentException('Number should have exactaly 8 digits');
        } else {
            $sum = array_sum(array_map(
                function ($x, $y) { return $x * $y; },
                str_split($num),
                $multipliers
            ));

            $rest = $sum % 11;
            if ($rest === 0) {
                $verifyDigit = 5;
            } elseif ($rest === 1) {
                $verifyDigit = 0;
            } else {
                $verifyDigit = (11 - $rest);
            }
            $num .= $verifyDigit;
        }

        return $num;
    }
}
