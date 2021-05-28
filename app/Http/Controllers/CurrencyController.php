<?php

namespace App\Http\Controllers;

use App\Http\Resources\CurrencyCollection;
use App\Http\Resources\CurrencyResource;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function index()
    {
        return new CurrencyCollection(Currency::paginate());
    }

    public function currency(Currency $currency)
    {
        return CurrencyResource::make($currency);
    }
}
