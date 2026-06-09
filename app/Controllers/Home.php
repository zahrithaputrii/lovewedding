<?php namespace App\Controllers;

use App\Models\LayananModel;
use App\Models\VendorModel;

class Home extends BaseController
{
    public function index()
    {
        $layanans = (new LayananModel())->findAll();
        $vendors = (new VendorModel())->orderBy('rating', 'DESC')->limit(6)->findAll();
        return view('home', ['layanans' => $layanans, 'vendors' => $vendors]);
    }
}