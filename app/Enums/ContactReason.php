<?php

namespace App\Enums;

enum ContactReason: string
{
    case DUVIDAS_E_SUPORTE = 'duvidas_e_suporte';
    case ELOGIOS = 'elogios';
    case RECLAMACOES = 'reclamacoes';
    case PROPOSTAS = 'propostas';
}
