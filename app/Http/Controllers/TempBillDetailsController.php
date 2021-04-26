<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BillDetailsTemp;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Response;

class TempBillDetailsController extends Controller
{
    public function loadTempBillDetails(){

		$allData = BillDetailsTemp::join('categories', 'bill_details_temps.categoryId', '=', 'categories.id')
		->join('customers', 'customers.id', '=', 'bill_details_temps.customerId')
		->join('products', 'products.id', '=', 'bill_details_temps.productId')	
		->get(['bill_details_temps.*','products.productName','products.price', 'categories.categoryName','customers.customerName']);

        return json_encode($allData);
    }

    public function saveTempBillDetails(Request $req){
    	$tempBillDetails = new BillDetailsTemp;
        $tempBillDetails->categoryId = $req->category;
        $tempBillDetails->customerId = $req->customer;
        $tempBillDetails->productId = $req->product;
        $tempBillDetails->price = $req->price;

        $tempBillDetails->save();

        return Response::json(array('success' => true, 'last_insert_id' => $tempBillDetails->id), 200);
    }

    public function deleteTempBillDetails($id){
    	try{
    		BillDetailsTemp::where('id', $id)->delete();
    		return Response::json(array('success' => true, 'message' => "Deleted Successfully"), 200);
    	}catch(Exception $e){
    		return Response::json(array('Error' => true, 'message' => "Something went Wrong"), 204);
    	}
    }
}
