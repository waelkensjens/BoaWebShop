<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    protected EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function load(ObjectManager $manager): void
    {
        $categories = json_decode(file_get_contents('assets/data/categories.json'));
        foreach ($categories->categories as $category) {

            if ($this->checkForExisting($category->name) === true) {
                continue;
            }

            $newCategory = new Category();
            $newCategory->setName($category->name);

            $manager->persist($newCategory);

            $manager->flush();

        }

    }

    /**
     * Check for existing record
     *
     * Todo: check with Charles if this is needed since running fixtures purges db (I think)
     *
     * @param string $name The category name
     * @return bool
     */
    private function checkForExisting(string $name): bool
    {
        $category = $this->manager->getRepository(Category::class);

        $result = $category->findOneBy(['name' => $name]);

        if ($result === null) {
            return false;
        }
        return true;
    }
}
