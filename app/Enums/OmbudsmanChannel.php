<?php

namespace App\Enums;

enum OmbudsmanChannel: string
{
    case AGRICULTOR = 'agricultor_e_produtor_parceiro';
    case REPRESENTANTE = 'representante_e_colaboradores';
    case VAREJO = 'varejo_e_industrias_parceiras';
    case PARCEIROS = 'parceiros_institucionais';
}
