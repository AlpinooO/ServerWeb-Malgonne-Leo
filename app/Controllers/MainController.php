<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class MainController extends CoreController
{

    public function test()
    {
        $brandModel = new Brand(); 
        $list = $brandModel->findAll();
        $elem = $brandModel->find(7);
        dump($list);
        dump($elem);
    }
    /**
     * Affiche la page d'accueil du site
     */
    public function home()
    {
        // Ci dessous je créer une instance du model Category
        $categoryModel = new Category();
        // Ensuite j'execute la fonction findAllForHomePage() du model Category
        $categories = $categoryModel->findAllForHomePage();
        // dump($categories);
        $this->show('home', [
            'categories' => $categories
        ]);
    }

    /**
     * Show legal mentions page
     */
    public function legalMentions()
    {
        // Affiche la vue dans le dossier views
        $this->show('mentions');
    }

    public function productList()
    {
        $productModel = new Product();
        $products = $productModel->findAll();
        $this->show('product_list',[
            'products'=>$products
        ]);
    }

}