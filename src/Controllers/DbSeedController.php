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
        $data = $this->generateCategoriesData(12);
        $this->db->table('categories')->insert($data);
    }

    /**
     * 
     * @return [type] [description]
     */
    private function generateCategoriesData(int $count)
    {
        for ($i=1; $i <= $count; $i++) { 
            $this->data['categories'][] = [
                'name'        => $this->fakeGenerator->words(2, true),
                'code'        => $i,
                'description' => $this->fakeGenerator->paragraph(10)
            ];
        }

        return $this->data['categories'];
    }


}


