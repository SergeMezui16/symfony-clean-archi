<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Framework\Symfony\Controller;

use CleanArchi\Shared\Infrastructure\Framework\Symfony\Messenger\MessengerCommandBus;
use CleanArchi\Shared\Infrastructure\Framework\Symfony\Messenger\MessengerQueryBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class BaseAbstractController extends AbstractController
{
    #[\Override]
    public static function getSubscribedServices(): array
    {
        $subscribedServices = parent::getSubscribedServices();

        $subscribedServices[] = MessengerCommandBus::class;
        $subscribedServices[] = MessengerQueryBus::class;
        $subscribedServices[] = SerializerInterface::class;
        $subscribedServices[] = TranslatorInterface::class;

        return $subscribedServices;
    }

    public function isLogged(): bool
    {
        return $this->getUser() !== null;
    }

//    public function getSecurityUser(bool $throwError = true): ?SecurityUser
//    {
//        /** @var SecurityUser|null $user */
//        $user = $this->getUser();
//
//        if (null === $user && $throwError) {
//            throw $this->createAccessDeniedException(
//                'You must be authenticated to access this resource.'
//            );
//        }
//
//        return $user;
//    }
//
//    protected function createAccessDeniedException(
//        string $message = 'Access Denied.',
//        ?\Throwable $previous = null
//    ): AccessDeniedException {
//        return new AccessDeniedException($message, $previous);
//    }

    protected function trans(string $key, array $params = [], string $domain = 'messages'): string
    {
        /** @var TranslatorInterface $trans */
        $trans = $this->container->get(TranslatorInterface::class);
        return $trans->trans($key, $params, $domain);
    }

    protected function handleCommand(object $command): mixed
    {
        return $this->container->get(MessengerCommandBus::class)->handle($command);
    }

    protected function handleQuery(object $query): mixed
    {
        return $this->container->get(MessengerQueryBus::class)->handle($query);
    }
}
