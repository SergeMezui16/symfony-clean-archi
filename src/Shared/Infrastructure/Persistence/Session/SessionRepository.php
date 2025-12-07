<?php

declare(strict_types=1);

namespace CleanArchi\Shared\Infrastructure\Persistence\Session;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class SessionRepository
{
    protected Session $session;

    private string $sessionKey;

    public function __construct(RequestStack $requestStack, string $className)
    {
        $this->session = $requestStack->getSession();
        $this->sessionKey = str_replace('\\', '_', $className);
    }

    /**
     * @return array<string, mixed>
     */
    public function findAll(): array
    {
        return $this->session->get($this->sessionKey, []);
    }

    public function persist(object $obj, string $key): void
    {
        $all = $this->findAll();
        $all[$key] = serialize($obj);
        $this->session->set($this->sessionKey, $all);
    }

    public function findByKey(string $key): ?object
    {
        $all = $this->findAll();

        if (isset($all[$key])) {
            return unserialize($all[$key]);
        }

        return null;
    }

    public function clean(string $key): void
    {
        $all = $this->findAll();

        if (isset($all[$key])) {
            unset($all[$key]);
            $this->session->set($this->sessionKey, $all);
        }
    }

    public function clear(): void
    {
        $this->session->remove($this->sessionKey);
    }
}
