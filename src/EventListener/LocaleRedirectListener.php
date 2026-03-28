<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

#[AsEventListener(event: KernelEvents::REQUEST, priority: 20)]
class LocaleRedirectListener
{
    public function __invoke(RequestEvent $event): void
    {
        $request = $event->getRequest();

        if ($request->getPathInfo() !== '/') {
            return;
        }

        if ($request->cookies->has('locale')) {
            return;
        }

        $preferredLanguage = $request->getPreferredLanguage(['de', 'en']);

        if ($preferredLanguage === 'en') {
            $event->setResponse(new RedirectResponse('/en', 302));
        }
    }
}
