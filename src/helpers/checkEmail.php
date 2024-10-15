<?php

// namespace App\helpers;

// checa se tem espaço no meio dos caracteres
function has_space($string)
{
    return strpos($string, ' ') !== false;
}

function is_email_valid($email) 
{
    // o email luis@outlook.com ficaria como: [0] -> "luis", [1] -> "outlook.com"
    $emailParts = explode('@', $email);

    // se nao dividiu em duas partes igual, erro
    if (sizeof($emailParts) != 2) return false;

    // ficaria, por exemplo, "outlook.com" 
    $domain = $emailParts[1];

    // outlook.com -> [0] -> outlook, [1] -> com
    $domainParts = explode('.', $domain);

    if (sizeof($domainParts) == 1) return false;

    // Se nem um nem outro possuem numero no meio
    if (!ctype_alpha($domainParts[0]) || !ctype_alpha($domainParts[1])) return false;
    
    //Se tiver espaço no meio dos caracteres retorna false
    elseif (has_space($emailParts[0]) || has_space($domainParts[0]) || has_space($domainParts[1])) return false;

    return true;
}

