<?php

namespace App\Enums;

/**
 * Enum representing the status of a certain entity.
 *
 * @method static Status ACTIVE()
 * @method static Status INACTIVE()
 *
 * @author Mirbahar Nurul Amin
 */
enum Status: int
{
    case ACTIVE = 1;
    case INACTIVE = 0;
}

