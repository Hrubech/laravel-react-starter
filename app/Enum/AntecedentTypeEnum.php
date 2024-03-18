<?php
namespace App\Enum;


enum AntecedentTypeEnum:string
{
    case FAMILIAL = 'familial';
    case PERSONNEL = 'personnel';
    case CHIRURGICAL = 'chirurgical';
    case ALLERGIE = 'allergie';
}