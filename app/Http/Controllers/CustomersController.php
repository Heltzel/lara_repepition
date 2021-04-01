<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Events\NewCustomerHasRegisteredEvent;
// use Intervention\Image\ImageManagerStatic as Image;

class CustomersController extends Controller
{
   public function __construct()
   {
        $this->middleware('auth');
   }

   public function index(Customer $customer, Company $company){
    // $activeCustomers= $customer->active();
    // $inactiveCustomers= $customer->inactive();
    // $companies = $company->all();

    // company refers in this case to the company method in the customer model
    // it makes fetching a lot faster. it reduces the amount of queries from for every customer to only 2 or 3
    // (eagerloading)
    $customers = $customer->with('company')->paginate(10);
    // return view('customers.index', compact('customers','activeCustomers', 'inactiveCustomers', 'companies'));
    return view('customers.index', compact('customers'));
   }

   public function create(Company $company){
    $companies = $company->all();
    $customer = new Customer;
    return view('customers.create', compact('customer', 'companies'));
   }

   // php artisan storage:link
/*
   public function store (){
       $this->authorize('create', Customer::class);
    $customer = Customer::create($this->validateRequest());
    $this->storeImage($customer);
    event(new NewCustomerHasRegisteredEvent($customer));
    return redirect('customer');
   }
*/
   public function store(){
    $this->authorize('create', Customer::class);
    $customer = Customer::create($this->validateRequest());
    $this->storeImage($customer);
    event(new NewCustomerHasRegisteredEvent($customer));
    return redirect('customer');
   }

   public function show(Customer $customer){
    return view('customers.show', compact('customer'));
   }

   public function edit(Customer $customer, Company $company ){
    $companies =$company->all();
    return view('customers.edit', compact('customer', 'companies'));
   }

   public function update(Customer $customer){
       $this->authorize('update', $customer);
    $customer->update($this->validateRequest());
    $this->storeImage($customer);
    return redirect('customer/'.$customer->id);
   }

   public function destroy(Customer $customer){
       $this->authorize('delete', $customer);
     $customer->delete();
     return redirect ('customer');
   }

   private function validateRequest(){

    return  request()->validate([
        "name" => "required",
        'email' => 'required | email',
        'active' => 'required',
        'company_id' => 'required',
        'image' => 'sometimes |file|image|max:5000',
    ]);
   }

//the store method is a method of uploadedFile class (vid 39)
// image is returning the uploadedFile class
// look in storage/app/public/uploads
// run php artisan  storage:link
   private function storeImage($customer){
       if (request()->has('image')){
          $customer->update([
            'image' => request()->image->store('uploads', 'public')
          ]);
            // $image = Image::make(public_path('storage/'.$customer->image))->fit(200,120, function ($constraint) {
            // $constraint->upsize();
        // });
        $image = Image::make(public_path('storage/'.$customer->image))->heighten(200);
      $image->save();
       }
   }
}
//  composer require intervention/image
//  http://image.intervention.io/
