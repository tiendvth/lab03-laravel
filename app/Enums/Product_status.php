<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Product_status extends Enum
{
    const ACTIVE =   1;
    const DE_ACTIVE =   0;
    const DELETE = -1;
}
