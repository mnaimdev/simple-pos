<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    public function supplier()
    {
        $suppliers = Supplier::all();

        return view('backend.supplier.index', [
            'suppliers'     => $suppliers,
        ]);
    }

    public function create()
    {
        return view('backend.supplier.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:suppliers',
            'phone'                 => 'required|max:255',
            'address'               => 'required|string|max:255',
            'country'               => 'required|string|max:255',
            'city'                  => 'required|string|max:255',
            'shopname'              => 'required|string|max:255',
            'account_holder'        => 'required|string|max:255',
            'account_number'        => 'required|integer',
            'bank_name'             => 'required|string|max:255',
            'bank_branch'           => 'required|string|max:255',
            'type'                  => 'required|string|max:255',
            'image'                 => 'required|mimes:jpg,png',
        ]);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $file_name = hexdec(uniqid()) . '.' . $extension;
        Image::make($image)->save(public_path('/uploads/supplier/' . $file_name));


        Supplier::create([
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
            'type'                  => $request->type,
            'image'                 => $file_name,
            'created_at'            => Carbon::now(),
        ]);

        $notification = array(
            'message'       => 'Supplier info added',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }


    public function show($id)
    {
        $supplier_info  = Supplier::find($id);
        return view('backend.supplier.view', [
            'supplier_info' => $supplier_info,
        ]);
    }

    public function edit($id)
    {

        $supplier_info = Supplier::find($id);

        return view('backend.supplier.edit', [
            'supplier_info' => $supplier_info,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|email|unique:suppliers,email,' . $request->id,
            'phone'                 => 'required|max:255',
            'address'               => 'required|string|max:255',
            'country'               => 'required|string|max:255',
            'city'                  => 'required|string|max:255',
            'shopname'              => 'required|string|max:255',
            'account_holder'        => 'required|string|max:255',
            'account_number'        => 'required|integer',
            'bank_name'             => 'required|string|max:255',
            'bank_branch'           => 'required|string|max:255',
            'type'                  => 'required|string|max:255',
            'image'                 => 'mimes:jpg,png',
        ]);

        if ($request->image == '') {



            Supplier::find($request->id)->update([
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
                'type'                  => $request->type,
                'created_at'            => Carbon::now(),
            ]);

            $notification = array(
                'message'       => 'Supplier info updated',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        }


        // else
        else {

            $supplier_img = Supplier::find($request->id)->image;
            $deleted_from = public_path('/uploads/supplier/' . $supplier_img);
            unlink($deleted_from);

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $file_name = hexdec(uniqid()) . '.' . $extension;
            Image::make($image)->save(public_path('/uploads/supplier/' . $file_name));

            Supplier::find($request->id)->update([
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
                'type'                  => $request->type,
                'image'                 => $file_name,
                'created_at'            => Carbon::now(),
            ]);
        }

        $notification = array(
            'message'       => 'Supplier info updated',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }

    public function destroy($id)
    {
        Supplier::Find($id)->delete();

        $notification = array(
            'message' => 'Supplier deleted',
            'alert-type' => 'success',
        );

        return back()->with($notification);
    }
}
