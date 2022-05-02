<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * @class InvoiceController
 * @author ANGIE CELESTE PAEZ MONTEJO
 */

class InvoiceController extends Controller
{
    /**
     * @method getInvoices
     * methodo in charge of searching the invoices with relationships in the system
     * @return collection $invoice
     */
    public function getInvoices(){
        $invoices = Invoice::with('buyer','user','items')->get();
        return  $invoices;
    }

    /**
     * @method getInvoices
     * methodo in charge of searching the invoices for id with relationships in the system
     * @param $id id of invoice
     * @return collection $invoice
     */
    public function getInvoicesId($id){
        $invoices = Invoice::with('buyer','user','items')->find($id);
        return  $invoices;
    }
}
