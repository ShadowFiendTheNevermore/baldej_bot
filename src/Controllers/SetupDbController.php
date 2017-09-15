<?php 

namespace Bot\Controllers;

use Illuminate\Database\Schema\Builder as Schema;

/**
* Setup Database Controller
*
* Make the DB from service provider : use it once
*/
class SetupDbController
{

    /**
     * Schema builder variable
     * 
     * @var Illuminate\Database\Schema\Builder
     */
    private $schema;

    /**
     * Auto binding Illuminate\Database\Schema\Builder
     */
    public function __construct()
    {
        $this->schema = $this->resolveSchema();
    }

    /**
     * Setup DB handle method
     * 
     * @return void
     */
    public function setup()
    {
        $this->createCategories();
        $this->createProducts();
    }


    /**
     * Setup categories table
     * 
     * @return void
     */
    protected function createCategories() : void
    {
        $this->schema->engine = 'InnoDB';
        $this->schema->create('categories', function ($table){
            $table->increments('id');
            $table->string('name');
            $table->integer('code');
            $table->text('description')->nullable();
        });
    }


    /**
     * 
     * @return [type] [description]
     */
    protected function createProducts() : void
    {
        $this->schema->engine = 'InnoDB';
        $this->schema->create('products', function ($table){
            $table->increments('id');
            $table->string('name');
            $table->float('price');
            $table->integer('code');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    /**
     * Delete DB
     * @return void
     */
    public function delete()
    {
        $this->schema->drop('products');
        $this->schema->drop('categories');
    }

    /**
     * Get a schema builder instance for the connection.
     *
     * @return \Illuminate\Database\Schema\Builder
     */
    private function resolveSchema() : Schema
    {
        return resolve('Schema');
    }
}
