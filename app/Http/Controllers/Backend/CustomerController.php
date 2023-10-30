<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function customer()
    {
        $customers = Customer::all();

        return view('backend.customer.index', [
            'customers'     => $customers,
        ]);
    }

    public function create()
    {
        return view('backend.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:customers',
            'phone'                 => 'required|max:255',
            'address'               => 'required|string|max:255',
            'country'               => 'required|string|max:255',
            'city'                  => 'required|string|max:255',
            'shopname'              => 'required|string|max:255',
            'account_holder'        => 'required|string|max:255',
            'account_number'        => 'required|integer',
            'bank_name'             => 'required|string|max:255',
            'bank_branch'           => 'required|string|max:255',
            'image'                 => 'required|mimes:jpg,png',
        ]);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $file_name = hexdec(uniqid()) . '.' . $extension;
        Image::make($image)->save(public_path('/uploads/customer/' . $file_name));


        Customer::create([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'address'               => $request->address,
            'country'               => $request->country,
            'city'                  => $request->city,
            'shopname'              => $request->shopname,
            'account_holder'        => $request->account_holder,
            'account_number'        => $request->account_number,
            'bank_name'             => $request->bank_name,
            'bank_branch'           => $request->bank_branch,
            'image'                 => $file_name,
            'created_at'            => Carbon::now(),
        ]);

        $notification = array(
            'message'       => 'Customer info added',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }


    public function show($id)
    {
        $customer_info  = Customer::find($id);
        return view('backend.customer.view', [
            'customer_info' => $customer_info,
        ]);
    }

    public function edit($id)
    {

        $customer_info = Customer::find($id);

        return view('backend.customer.edit', [
            'customer_info' => $customer_info,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:customers,email,' . $request->id,
            'phone'                 => 'required|max:255',
            'address'               => 'required|string|max:255',
            'country'               => 'required|string|max:255',
            'city'                  => 'required|string|max:255',
            'shopname'              => 'required|string|max:255',
            'account_holder'        => 'required|string|max:255',
            'account_number'        => 'required|integer',
            'bank_name'             => 'required|string|max:255',
            'bank_branch'           => 'required|string|max:255',
            'image'                 => 'mimes:jpg,png',
        ]);

        if ($request->image == '') {



            Customer::find($request->id)->update([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'phone'                 => $request->phone,
                'address'               => $request->address,
                'country'               => $request->country,
                'city'                  => $request->city,
                'shopname'              => $request->shopname,
                'account_holder'        => $request->account_holder,
                'account_number'        => $request->account_number,
                'bank_name'             => $request->bank_name,
                'bank_branch'           => $request->bank_branch,
                'created_at'            => Carbon::now(),
            ]);

            $notification = array(
                'message'       => 'Customer info updated',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        }


        // else
        else {

            $customer_img = Customer::find($request->id)->image;
            $deleted_from = public_path('/uploads/customer/' . $customer_img);
            unlink($deleted_from);

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $file_name = hexdec(uniqid()) . '.' . $extension;
            Image::make($image)->save(public_path('/uploads/customer/' . $file_name));

            Customer::find($request->id)->update([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'phone'                 => $request->phone,
                'address'               => $request->address,
                'country'               => $request->country,
                'city'                  => $request->city,
                'shopname'              => $request->shopname,
                'account_holder'        => $request->account_holder,
                'account_number'        => $request->account_number,
                'bank_name'             => $request->bank_name,
                'bank_branch'           => $request->bank_branch,
                'image'                 => $file_name,
                'created_at'            => Carbon::now(),
            ]);
        }

        $notification = array(
            'message'       => 'Customer info updated',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }

    public function destroy($id)
    {
        Customer::Find($id)->delete();

        $notification = array(
            'message' => 'Customer deleted',
            'alert-type' => 'success',
        );

        return back()->with($notification);
    }
}
