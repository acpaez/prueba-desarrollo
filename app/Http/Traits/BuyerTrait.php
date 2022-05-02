<?php
namespace App\Http\Traits;

use App\Models\Buyer;
use Illuminate\Http\Request;


/**
 * @trait ItemsController
 * @author ANGIE CELESTE PAEZ MONTEJO
 */

trait BuyerTrait {

    /**
     * @method createBuyer
     * method in charge of creating the buyer
     * @param buyer array with buyer information (name, nit)
     * @return number id of buyer created
     */
    public function createBuyer(Request $request){
        $buyer = new Buyer();
        $buyer->name =$request->buyer['name'];
        $buyer->nit =$request->buyer['nit'];
        $buyer->save();

        return $buyer->id;
    }

    public function updateBuyer(Request $request, $id){
        $buyer = Buyer::find($id);
        $buyer->name =$request->buyer['name'];
        $buyer->nit =$request->buyer['nit'];
        $buyer->save();
    }
}
