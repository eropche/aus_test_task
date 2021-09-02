<?php

declare(strict_types=1);

namespace App\VO;

use MyCLabs\Enum\Enum;

final class Country extends Enum
{
    public const AUSTRALIA_CODE = 'AU';
    public const USA_CODE = 'US';
    public const NZ_CODE = 'NZ';

    public const AUSTRALIA_NAME = 'Australia';
    public const USA_NAME = 'USA';
    public const NZ_NAME = 'New Zealand';

    public static array $countries = [
        self::AUSTRALIA_CODE => self::AUSTRALIA_NAME,
        self::USA_CODE => self::USA_NAME,
        self::NZ_CODE => self::NZ_NAME,
    ];
}
