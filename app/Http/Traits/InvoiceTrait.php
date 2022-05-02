<?php
namespace App\Http\Traits;

use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Traits\BuyerTrait;

/**
 * @trait ItemsController
 * @author ANGIE CELESTE PAEZ MONTEJO
 */

trait InvoiceTrait {

    use BuyerTrait;

    /**
     * @method createInvoice
     * Method in charge of creating the invoices and the buyer, the latter through a trait
     * @param buyer array with buyer information (name, nit)
     * @param invoice array with invoice information (invoice_number, vat_before_value, value_to_pay, vat_id)
     * @return number id of invoice created
     */

    public function createInvoice(Request $request){
        $buyer_id = $this->createBuyer($request);

        $invoice = new Invoice();
        $invoice->invoice_number = $request->invoice['number_invoice'];
        $invoice->vat_before_value = $request->invoice['vat_before_value'];
        $invoice->value_to_pay = $request->invoice['value_invoice'];
        $invoice->vat_id = $request->invoice['vat_id'];
        $invoice->buyer_id = $buyer_id;
        $invoice->user_id = auth()->user()->id;
        $invoice->save();

        return $invoice->id;
    }

    public function updateInvoice(Request $request, $id){
        $buyer_id = $this->updateBuyer($request, $request->buyer['id']);

        $invoice = Invoice::find($id);
        $invoice->invoice_number = $request->invoice['number_invoice'];
        $invoice->vat_before_value = $request->invoice['vat_before_value'];
        $invoice->value_to_pay = $request->invoice['value_invoice'];
        $invoice->vat_id = $request->invoice['vat_id'];
        $invoice->save();
    }
}


