<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Rompetomp\InertiaBundle\Service\InertiaInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class HomeController extends AbstractController
{
    protected CategoryRepository $categoryRepo;
    protected ProductRepository $productRepo;
    protected Serializer $serializer;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProductRepository $productRepository,
    ) {
        $this->categoryRepo = $categoryRepository;
        $this->productRepo = $productRepository;
        $classMetadataFactory = new ClassMetaDataFactory(
            new AnnotationLoader(new AnnotationReader())
        );
        $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter)];

        $this->serializer = new Serializer($normalizers, $encoders);

    }

    /**
     * @Route(
     *     "/",
     *     name="home",
     *     methods={"GET"},
     *     options={"expose"=true})
     * )
     */
    public function index(
        InertiaInterface $inertia
    ): Response {
        return $inertia->render('Home',
            [
                'categories' => $this->categoryRepo->findAll(),
                'products' => $this->productRepo->findAll(),
            ]
        );
    }
}
