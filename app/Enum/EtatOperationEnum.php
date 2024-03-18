<?php
namespace App\Enum;


enum EtatOperationEnum:string
{
    case EN_ATTENTE = 'en_attente';
    case EN_COURS = 'en_cours';
    case ANNULEE = 'annulee';
    case TERMINEE = 'terminee';
}