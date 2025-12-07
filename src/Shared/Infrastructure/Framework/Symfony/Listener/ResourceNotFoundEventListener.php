<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Framework\Symfony\Listener;

use CleanArchi\Shared\Domain\Exception\ResourceNotFoundException;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Return a 404 Not Found Page when a RessourceNotFoundException occurs.
 */
#[AsEventListener('kernel.exception')]
final readonly class ResourceNotFoundEventListener
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function __invoke(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if ($exception instanceof ResourceNotFoundException) {
            $this->logger->info($exception->getMessage().' => '.$exception->getTraceAsString());

            throw new NotFoundHttpException($exception->getMessage(), $exception);
        }
    }
}
