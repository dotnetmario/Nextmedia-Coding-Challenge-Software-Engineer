<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Product;

class CreateProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create {name} {price} {category} {description?} {image?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a product record, the category is an integer. The description and image are optional';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $price = $this->argument('price');
        $category = $this->argument('category');
        $description = $this->argument('description');
        $image = $this->argument('image');

        $product = (new Product)->addProduct($category, $name, $price, $description, $image);

        if(isset($product))
            $this->info('The product was created successfully!');
        else
            $this->info('Something went wrong!');

        return 0;
    }
}
