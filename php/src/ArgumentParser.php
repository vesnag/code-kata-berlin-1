<?php

class ArgumentParser
{
  function convert(string $arg): array {
    // Allow characters (a-z), numbers and signs - -- =
    if (!preg_match("/^[a-z0-9 \-\--\=]+$/i", $arg)) {
      return [];
    }

    $ignoredOptions = ['c', 'de'];
    $aliases = ['foobaralias', 'o'];
    $optionsWithMandatoryValues = ['f', 'o'];

    $args = explode(' ', str_replace('--', '-', $arg));

    $return = [];
    foreach ($args as $arg) {
      $argsV = explode('=', $arg);
      $argA = $argsV[0] ?? NULL;
      $argV = $argsV[1] ?? NULL;
      if ($argA) {
        $arg = $argA;
      }
      if (in_array(str_replace('-', '', $arg), $ignoredOptions)) {
        continue;
      }
      if (in_array(str_replace('-', '', $arg), $aliases)) {
        $return[$arg] = $argV ?: TRUE;
      }
      else {
        $argsS = str_split($arg);
        $optSign = array_shift($argsS);
        if ($optSign !== '-') {
          break;
        }

        foreach ($argsS as $argS) {
          $value = $argV ?: TRUE;
          if (in_array($argS, $optionsWithMandatoryValues) && !$argV) {
            $value = 'Is Mandatory';
          }
          $return[sprintf('%s%s', $optSign, $argS)] = $value;
        }
      }
    }

    return $return;
  }

}
