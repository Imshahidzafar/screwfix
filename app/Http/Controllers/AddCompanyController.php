<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\AddCompanyRequest;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Session;



class AddCompanyController extends Controller
{
    //


    public function addcompany(){

    	$countries=Country::all();
    	$cities=City::all();
    	$states=State::all();

    	return view('addcompany',compact('countries','cities','states'));
    }

  

    public function savecompany(AddCompanyRequest $data){

    		 // return $data->all();
    		   
			
			
			 	  $countryid= new Country;
			 	  // return $countryid->all();
			  $stateid= new State;
			   $cityid= new City;
			 $newcompany= new Company;

			    $newcompany->country_id=$data->get('country');
			 	$newcompany->state_id=$data->get('state');
			 	$newcompany->city_id=$data->get('city');
			 	$newcompany->name=$data->get('name');
			 	$newcompany->phone=$data->get('phone');
			 	$newcompany->address=$data->get('address');
			 	$newcompany->cr_number=$data->get('crnumber');
			 	$newcompany->cr_registration=$data->get('crregistration');
			 	$newcompany->cr_expiry=$data->get('crexpiry');
			 	$newcompany->vatin_number=$data->get('vname');
			 	$newcompany->vatin_registration=$data->get('vregistration');
			 	$newcompany->vatin_expiry=$data->get('vexpiry');

    	 $newcompany->save();
    	
    	 
    	 
    	 	Session::flash("successmsg","Company has been successfully added  into the system");
    	 return back();


    }
    
}
