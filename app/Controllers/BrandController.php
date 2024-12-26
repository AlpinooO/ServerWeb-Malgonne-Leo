<?php

namespace App\Controllers;

use App\Models\Brand;

class BrandController {
    private $brandModel;

    public function __construct() {
        $this->brandModel = new Brand();
    }

    public function index() {
        $brands = $this->brandModel->read();

        require 'views/brands/index.php'; 
    }


}