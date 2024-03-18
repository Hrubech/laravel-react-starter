<?php
namespace App\Enum;


enum EtatFactureEnum:string
{
    case PAYEE = 'payee';
    case NON_PAYEE = 'non_payee';
    case PAYEE_EN_PARTIE = 'payee_en_partie';
}