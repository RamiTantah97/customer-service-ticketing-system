<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'Hi from customer index';
        $data = Customer::query()->get()->all();
        return response()->json ($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        echo "Hi from customer store\n";
        $fName = $request->query('fName');
        $lName = $request->query('lName');
        $birthday = $request->query('birthday');
        $photo = $request->query('photo');
        $phoneNum = $request->query('phoneNum');
        $email = $request->query('email');

        $data = Customer::query()->create([
            'fName'=>$fName,
            'lName'=>$lName,
            'birthday'=>$birthday,
            'photo'=>$photo,
            'phoneNum'=>$phoneNum,
            'email'=>$email
        ]);

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer ,Request $request)
    {
        echo "Hi from Customer show\n";
        $CustomerQuery = Customer::query();
        $CustomerQuery->where('c_id','=',$request->query('c_id'));
        $data = $CustomerQuery->get()->all();

        if($data == "[]")
            return response("couldn't find the item!!");

        return response()->json($data ,Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        echo "Hi from Customer update\n";

        $customerQuery = Customer::query();
        $customerQuery->where('c_id','=',$request->query('c_id'));

        if($customerQuery->get()=="[]")
            return response("couldn't find the item!!");
        
        if($request->query('fName')){
            $customerQuery->update([
                'fName'=>$request->query('fName')
            ]);
        }

        if($request->query('lName')){
            $customerQuery->update([
                'lName'=>$request->query('lName')
            ]);
        }

        if($request->query('birthday')){
            $customerQuery->update([
                'birthday'=>$request->query('birthday')
            ]);
        }

        if($request->query('photo')){
            $customerQuery->update([
                'photo'=>$request->query('photo')
            ]);
        }

        if($request->query('phoneNum')){
            $customerQuery->update([
                'phoneNum'=>$request->query('phoneNum')
            ]);
        }

        if($request->query('email')){
            $customerQuery->update([
                'email'=>$request->query('email')
            ]);
        }

        return response('updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer , Request $request)
    {
        echo "Hi from customer destroy\n";

        $customerQuery = Customer::query();
        $customerQuery->where('c_id','=',$request->query('c_id'));
        if($customerQuery->get()=="[]")
            return response("couldn't find the item!!");

        else{
                $customerQuery->delete();
                return response('deleted successfully');
            }
    }
}