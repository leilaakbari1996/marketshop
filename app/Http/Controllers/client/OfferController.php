<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(){
        return view('client.offer.index',[
            'title' => 'بیشترین تخفیفات',
            'productOffers' => Product::offer(),
        ]);
    }
}
