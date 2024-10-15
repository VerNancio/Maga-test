<?php

function is_cpf_valid($cpf) {
    // Remove caracteres não numéricos
    $cpfLimpo = preg_replace('/\D/', '', $cpf);

    // Verifica se o CPF tem 11 dígitos
    if (strlen($cpfLimpo) !== 11 || !is_numeric($cpfLimpo)) {
        return false;
    }

    // Validação dos dígitos verificadores
    for ($indice = 9; $indice < 11; $indice++) {
        $soma = 0;
        for ($contador = 0; $contador < $indice; $contador++) {
            $soma += $cpfLimpo[$contador] * (($indice + 1) - $contador);
        }
        $digitoVerificador = ((10 * $soma) % 11) % 10;
        if ($cpfLimpo[$contador] != $digitoVerificador) {
            return false;
        }
    }
    return true;
}

