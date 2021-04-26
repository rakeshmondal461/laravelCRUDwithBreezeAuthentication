<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
class CustomerController extends Controller
{
	public function loadHomePage(){
        $customers = Customer::all();
        return view("showCustomer",['customers'=>$customers]);
    }

    public function addCustomer(Request $req){
    	$customer = new Customer;
        $customer->name = $req->name;
        $customer->mob = $req->mob;
        $customer->address = $req->address;
        $customer->save();
        return redirect('/addCustomer')->with('message', 'Submitted successfully!');
    }

    public function customersDataManipulate(Request $req){
			if (isset($_POST['Update']))
			{	
				$customerId = $req->Update;			
				$data = Customer::find($customerId);
   				return view("editCustomer",['data'=>$data]);
			}
			else
			{
				$data = Customer::find($req->Delete);
				$data->delete();
				return redirect('/view');
			}
    }

    public function updateCustomer(Request $req){
    	$customer = Customer::find($req->updateButton);
		$customer->name = $req->name;
		$customer->mob = $req->mob;
		$customer->address = $req->address;
		$customer->save();
		return redirect('/view');
    }

    public function searchData(Request $req){   
    	 $query = $req->get('query');
		     $data = Customer::where('name', 'LIKE', '%' . $query . '%')
		     	->orWhere('mob', 'like', '%'.$query.'%')
		     	->orWhere('address', 'like', '%'.$query.'%')	
		     	->get();
			$total_row = $data->count();
			$result = array(
				'total_data_count'  => $total_row,
				'searchData'  => $data
			);
			echo json_encode($result);
    }


}
