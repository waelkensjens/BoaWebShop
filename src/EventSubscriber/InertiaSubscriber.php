<?php

namespace App\EventSubscriber;

use App\Repository\CategoryRepository;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;

class InertiaSubscriber implements EventSubscriberInterface
{
    /** @var InertiaInterface */
    protected InertiaInterface $inertia;
    protected CategoryRepository $categoryRepo;

    /**
     * AppSubscriber constructor.
     *
     * @param InertiaInterface $inertia
     */
    public function __construct(
        InertiaInterface $inertia,
        CategoryRepository $categoryRepository,
    ) {
        $this->inertia = $inertia;
        $this->categoryRepo = $categoryRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::CONTROLLER => 'onControllerEvent',
        ];
    }

    public function onControllerEvent($event)
    {
        $this->inertia->share(
            'categories',$this->categoryRepo->findAll()
        );
    }
}