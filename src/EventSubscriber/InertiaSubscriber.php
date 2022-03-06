<?php

namespace App\EventSubscriber;

use App\Repository\CategoryRepository;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\KernelEvents;

class InertiaSubscriber implements EventSubscriberInterface
{
    /** @var InertiaInterface */
    protected InertiaInterface $inertia;
    protected CategoryRepository $categoryRepo;
    protected RequestStack $requestStack;

    /**
     * AppSubscriber constructor.
     *
     * @param InertiaInterface $inertia
     */
    public function __construct(
        InertiaInterface $inertia,
        CategoryRepository $categoryRepository,
        RequestStack $requestStack
    ) {
        $this->inertia = $inertia;
        $this->categoryRepo = $categoryRepository;
        $this->requestStack = $requestStack;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onControllerEvent',
        ];
    }

    public function version(Request $request)
    {
        return $this->inertia->getVersion();
    }

    public function onControllerEvent($event)
    {
        $session = $this->requestStack->getSession();

        $session->set('cart', array());

        $categories = $this->categoryRepo->findAll();

        $cart = $session->get('cart');

        $this->inertia->share(
            'data',
            [
                'categories' => $categories,
                'cart' => $cart
            ]
        );
    }

    public function someMethod()
    {
        $session = $this->requestStack->getSession();

        // stores an attribute in the session for later reuse
        $session->set('attribute-name', 'attribute-value');

        // gets an attribute by name
        $foo = $session->get('foo');

        // the second argument is the value returned when the attribute doesn't exist
        $filters = $session->get('filters', []);

        // ...
    }
}