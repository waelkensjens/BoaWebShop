<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    protected EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function load(ObjectManager $manager): void
    {
        $products = json_decode(file_get_contents('assets/data/products.json'));

        foreach ($products->products as $product) {

            if ($this->checkForExisting($product->name) === true) {
                continue;
            }

            $newProduct = new Product();
            $newProduct->setName($product->name);
            $newProduct->setDescription($product->description);
            $newProduct->setAlcoholPercentage($product->alcohol_percentage);
            $newProduct->setPriceExcl($product->price_excl);
            $newProduct->setVat($product->vat);

            $category = $this->getCategoryById($product->category_id);
            $newProduct->setCategory($category);

            $manager->persist($newProduct);

            $manager->flush();
        }

    }

    /**
     * Check for existing record
     *
     * Todo: check with Charles if this is needed since running fixtures purges db (I think)
     *
     * @param string $name The product name
     * @return bool
     */
    private function checkForExisting(string $name): bool
    {
        $product = $this->manager->getRepository(Product::class);

        $result = $product->findOneBy(['name' => $name]);

        if (!$result) {
            return false;
        }
        return true;
    }

    private function getCategoryById(int $categoryId): ?Category
    {
       $manager = $this->manager->getRepository(Category::class);

       return $manager->find($categoryId);
    }
}
