<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Framework\Symfony\Controller;

use CleanArchi\Shared\Domain\Exception\UserFacingError;
use Symfony\Component\Form\FormError;

abstract class WebAbstractController extends BaseAbstractController
{
    protected function buildUserFacingErrorMessage(UserFacingError $error): string
    {
        return $this->trans(
            $error->translationId(),
            $error->translationParameters(),
            $error->translationDomain()
        );
    }

    protected function buildFormError(UserFacingError $error): FormError
    {
        return new FormError($this->buildUserFacingErrorMessage($error));
    }
}
