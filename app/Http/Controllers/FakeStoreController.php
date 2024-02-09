<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Number;

class FakeStoreController extends Controller
{
    public function getProducts()
    {
        $client = new Client();
        $url = 'https://fakestoreapi.com/products';
        $response = $client->request("GET", $url);
        $products = json_decode($response->getBody(), true);
        // Number::toCurrency($products["price"], "EUR");
        return view("products", compact("products"));
    }

    public function getSingle($id)
    {
        $client = new Client();
        $url = 'https://fakestoreapi.com/products/' . $id;
        $response = $client->request("GET", $url);
        $product = json_decode($response->getBody(), true);
        return view("product", compact("product"));
    }
}
