<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{

    protected CategoryRepository $categoryRepo;
    protected EntityManagerInterface $manager;

    public function __construct(
        EntityManagerInterface $manager,
        CategoryRepository $categoryRepository
    ) {
        $this->manager = $manager;
        $this->categoryRepo = $categoryRepository;
    }

    #[Route('/categories/{name}', name: 'categories.show', options: [ 'expose' => true], methods: ['GET','HEAD'])]
    public function index(InertiaInterface $inertia, string $name): Response
    {
        $category  =  $this->categoryRepo->findOneBy(['name' => $name]);

        return $inertia->render(
            component: 'Categories/Index',
            props: [
                'category' => $category
            ]
        );
    }
}
