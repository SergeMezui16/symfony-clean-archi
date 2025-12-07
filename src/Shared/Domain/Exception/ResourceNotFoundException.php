<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Domain\Exception;

abstract class ResourceNotFoundException extends \DomainException implements UserFacingError
{
}
