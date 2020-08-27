<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Company;
use Illuminate\Support\Facades\Mail;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Mail\NewUserMail;
use Illuminate\Image\Facades\Image;

class CustomersController extends Controller
{

  public function __construct(){
    $this->middleware('auth'); //->except(['index']);
  }

  //gets data from the database
    public function index() {

      $customer = Customer::with('company');

     /*$activeCustomers= Customer::active()->get();
      $inactveCustomers= Customer::inactive()->get();


           return view(' customers.index',[
          'actives'=>$activeCustomers,
          'inactives'=>$inactveCustomers,
          ]); */

          return view('customers.index',['customers'=>$customer]);

    }

    public function create ()
    {
      $companies = Company::all();

      return view('customers.create',['companies'=>$companies]);
    }



    public function store ()
    {
      // this is the long way of doing storing data into the db
    /*  $customer = new Customer();
      $customer->name = request('name');
      $customer->email = request('email');
      $customer->active = request('active');
      $customer->save(); */

    $customer  = Customer::create($this->validateRequest());

    $this->storeImage($customer);

    event(new NewCustomerHasRegisteredEvent($customer));

      return redirect('customers');
    }

    public function show(Customer $customer)
    {
    // inside the function is a parameter customer this can be used in place  of the code below
    //  $customer = Customer::where('id',$customer)->firstOrfail();

     //  dd($customer);

      return view('customers.show',compact('customer'));
    }

    public function edit(Customer $customer){

      $companies = Company::all();

      return view('customers.edit',compact('customer','companies'));

    }

    public function update(Customer $customer){

       $customer->update ($this->validateRequest());
       $this->storeImage($customer);
       return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer){
      $customer->delete();

      return redirect('customers');
    }


    private function validateRequest(){

        //validates data entered first before validating image
        //since the image is optional if you validate the image alongside the data inputs
        //it MUST be required so to avoid this the steps below is used...
       $validatedData = request()->validate([
        'name'=> 'required|min:3',
        'email'=>'required|email',
        'active'=>'required',
        'company_id'=>'required',
      ]);

        if(request()->hasFile('image')){

            request()->validate([
                'image'=>'required|image|max:5000',
            ]);
        }

        return $validatedData;
    }

    private function storeImage($customer)
    {
        if(request()->has('image')){
            $customer->update([
                'image'=>request()->image->store('uploads','public'),
            ]);

            $image = image::make(public_path('storage/'.$customer->image))->fit(300,300);

            $image->save();
        }
    }

}
