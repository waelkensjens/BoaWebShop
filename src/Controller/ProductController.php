<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

    protected ProductRepository $productRepo;

    public function __construct(
        ProductRepository $productRepository
    ) {
        $this->productRepo = $productRepository;
    }

    #[Route('/products/{name}', name: 'products.show', options: [ 'expose' => true], methods: ['GET','HEAD'])]
    public function index(string $name): Response
    {
    $product  =  $this->productRepo->findOneBy(['name' => $name]);

    return $this->render(
        view: 'categories/index.html.twig',
        parameters: [
            'product' => $category
        ]
    );
    }
}
