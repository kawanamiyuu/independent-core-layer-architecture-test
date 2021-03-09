<?php
declare(strict_types=1);

namespace Core\Account\Domain\Models;

use Core\Account\Domain\Exceptions\InvariantException;

final class Email
{
    use ValueObjectString;

    /**
     * @param string $value
     * @throws InvariantException
     */
    private function __construct(string $value)
    {
        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvariantException('Invalid email:' . $value);
        }
        $this->value = $value;
    }
}
