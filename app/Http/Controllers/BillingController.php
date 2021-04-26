<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Category;
use App\Models\BillDetailsTemp;
use App\Models\BillDetail;
use App\Models\Billing;


class BillingController extends Controller
{
    public function loadBillingPage(){
        $customers = Customer::all();
        $categories = Category::all();
        BillDetailsTemp::truncate();
        return view("createBill",['customers'=>$customers,'categories'=>$categories]);
    }


    public function getProductsByCategory($id){
    	$products = Product::where("category",$id)->pluck("productName","id");
        return json_encode($products);
    }

    public function getProductPriceByProductId($id){
    	$price = Product::where("id",$id)->pluck("price");
        return json_encode($price);
    }

     public function submitBilling(Request $req){
        $billNo="BILLNO".rand();
        $billing = new Billing;
        $billing->customerId = $req->customer;
        $billing->totalAmount = $req->totAmount;
        $billing->billNumber = $billNo;
        $billing->paymentMode = $req->paymentMode;
        $billing->save();

        $billDetailsTemp = BillDetailsTemp::all();

        foreach($billDetailsTemp as $tempData){
            $billDetail = new BillDetail;
            $billDetail->billNumber = $billNo;

            $billDetail->customerId = $tempData->customerId;
            $billDetail->categoryId = $tempData->categoryId;
            $billDetail->productId = $tempData->productId;
            $billDetail->price = $tempData->price;

            $billDetail->save();
        }

        return redirect('/createBill')->with('message', 'Submitted successfully!');
    }

    public function showBillingPage(){
        return view("showBill");
    }


    public function loadBillings(){
        $allData = Billing::join('bill_details', 'billings.billNumber', '=', 'bill_details.billNumber')
        ->join('categories', 'categories.id', '=', 'bill_details.categoryId')
        ->join('products', 'products.id', '=', 'bill_details.productId')
        ->get(['products.productName','categories.categoryName','bill_details.billNumber','bill_details.price']);

       // $billings = Billing::all();

        $billings = Billing::join('customers', 'billings.customerId', '=', 'customers.id')
        ->get(['billings.*','customers.customerName']);

        $newArray = [];


        for($i = 0; $i <sizeof($billings); $i++){
            $billNumber = $billings[$i]->billNumber;
            $customerName = $billings[$i]->customerName;
            $paymentMode = $billings[$i]->paymentMode;
            $totalAmount = $billings[$i]->totalAmount;
            
            $newArrayN = [
                "billNumber" => $billNumber,
                "customerName" => $customerName,
                "paymentMode" => $paymentMode,
                "totalAmount" => $totalAmount
            ];

        
            for($j = 0; $j <sizeof($allData);$j++){

                $billNumbersub = $allData[$j]->billNumber; 
                $billDetail = $allData[$j];

                if($billNumber == $billNumbersub){
                    $newArrayN['data'][] = $billDetail;
                }
            }
            array_push($newArray, $newArrayN);
            
        }
        if(sizeof($newArray)>0){
            $object = json_decode(json_encode($newArray), FALSE);
            return view("showBill",['billingData'=>$object]);
        }else{
            return view("noDataAvailable");
        }
        
    }

}
