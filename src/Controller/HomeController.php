<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home', options: [ 'expose' => true], methods: ['GET','HEAD'])]
    public function index(InertiaInterface $inertia)
    {
        return $inertia->render(
            component: 'Home',
            props: [
                'products' => json_decode(json_encode( [
                    [
                        'name' => 'name1',
                        'description' => 'name1',
                        'priceExcl' => 1.20,
                    ],
                    [
                        'name' => 'name1',
                        'description' => 'name1',
                        'priceExcl' => 1.20,
                    ],
                    [
                        'name' => 'name1',
                        'description' => 'name1',
                        'priceExcl' => 1.20,
                    ],
                ])),
                'categories' => json_decode(json_encode( [
                    [
                        'name' => 'name1',
                        'description' => 'name1',
                        'priceExcl' => 1.20,
                    ],
                    [
                        'name' => 'name1',
                        'description' => 'name1',
                        'priceExcl' => 1.20,
                    ],
                    [
                        'name' => 'name1',
                        'description' => 'name1',
                        'priceExcl' => 1.20,
                    ],
                ]))
            ]
        );
    }

}
