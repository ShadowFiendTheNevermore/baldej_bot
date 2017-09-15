<?php 

namespace Bot\Controllers;

use Faker\Factory as Faker;

/**
* Main db Seeder
*/
class DbSeedController
{

    /**
     * [$db description]
     * @var Builder
     */
    protected $db;

    /**
     * [$fakeGenerator description]
     * @var Faker\Generator
     */
    protected $fakeGenerator;

    /**
     * Seeded data to table
     * @var array
     */
    protected $data = [];

    /**
     * Name of seeding table
     * 
     * @var string
     */
    protected $table = '';

    /**
     * How much category counted
     * 
     * @var int
     */
    private $category_count = 1;

    /**
     * 
     * @param Builder $DB
     */
    public function __construct()
    {
        $this->db = resolve('DB');
        $this->fakeGenerator = Faker::create();
    }

    /**
     * 
     * @return void
     */
    public function seed()
    {
        $categories = $this->generateCategoriesData(10);
        $products = $this->generateProductsData(30);

        $this->db->table('categories')->insert($categories);
        $this->db->table('products')->insert($products);
    }

    /**
     * Data for seeding categories
     * 
     * @return array 
     */
    private function generateCategoriesData(int $count)
    {
        if ($count > 0) {
            $this->category_count = $count;
        }

        for ($i=1; $i <= $count; $i++) { 
            $this->data['categories'][] = [
                'name'        => $this->fakeGenerator->words(2, true),
                'code'        => "code_{$i}",
                'description' => $this->fakeGenerator->paragraph(10)
            ];
        }

        return $this->data['categories'];
    }


    /**
     * Data for seeding products
     * 
     * @return array 
     */
    private function generateProductsData(int $count)
    {
        for ($i=1; $i <= $count; $i++) { 
            $this->data['products'][] = [
                'name'        => $this->fakeGenerator->words(3, true),
                'code'        => "code_{$i}",
                'price'       => $this->fakeGenerator->randomFloat(2, 10, 650),
                'category_id' => $this->fakeGenerator->numberBetween(1, $this->category_count)
            ];
        }

        return $this->data['products'];
    }

}


