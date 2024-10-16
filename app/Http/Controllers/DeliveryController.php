<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{

    public function delivery()
    {
        return view('delivery/inicio_delivery');
    }
}
