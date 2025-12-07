<?php

declare(strict_types=1);

namespace Marketplace\Shared\Presentation\Web\Controller;

use CleanArchi\Shared\Infrastructure\Framework\Symfony\Controller\WebAbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
#[Route('/', name: 'home', methods: ['GET'])]
final class HomeController extends WebAbstractController
{
    public function __invoke(): Response
    {
        return $this->render('home.html.twig');
    }
}
