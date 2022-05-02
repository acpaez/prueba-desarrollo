<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\VatValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @class ItemsController
 * @author ANGIE CELESTE PAEZ MONTEJO
 */
class VatValueController extends Controller
{
    /**
     * @method getVatValue
     * method in charge of bringing the VAT
     * @return collection vatValue
     */
    public function getVatValue(){
        return VatValue::all();
    }
}
