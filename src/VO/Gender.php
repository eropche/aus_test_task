<?php

declare(strict_types=1);

namespace App\VO;

use MyCLabs\Enum\Enum;

final class Gender extends Enum
{
    public const MALE = 'male';

    public const FEMALE = 'female';

    public function isFemale(): bool
    {
        return $this->getValue() === self::FEMALE;
    }

    public function isMale(): bool
    {
        return $this->getValue() === self::MALE;
    }
}
