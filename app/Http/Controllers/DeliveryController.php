<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function inicioDelivery()
    {
        return view('delivery/inicio_delivery');
    }
}
