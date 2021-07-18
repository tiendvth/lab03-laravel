<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class Size_status extends Enum
{
    const ACTIVE = 1;
    const DE_ACTIVE = 0;
    const DELETE = -1;
}
