<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('backend.product.index', [
            'products' => $products,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('backend.product.create', [
            'categories' => $categories,
            'suppliers' => $suppliers,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'          => 'required',
            'product_garage'        => 'required',
            'product_image'         => 'required|mimes:jpg,png',
            'buying_date'           => 'required',
            'expire_date'           => 'required',
            'buying_price'          => 'required',
            'selling_price'         => 'required',
            'category_id'           => 'required',
            'supplier_id'           => 'required',
        ]);


        $product_code = IdGenerator::generate(['table' => 'products', 'length' => 4, 'field' => 'product_code', 'prefix' => 'PC']);

        $image = $request->file('product_image');
        $extension = $image->getClientOriginalExtension();
        $file_name = hexdec(uniqid()) . '.' . $extension;
        Image::make($image)->save(public_path('/uploads/product/' . $file_name));


        Product::create([
            'product_name'                      => $request->product_name,
            'product_code'                      => $product_code,
            'product_garage'                    => $request->product_garage,
            'category_id'                       => $request->category_id,
            'supplier_id'                       => $request->supplier_id,
            'buying_date'                       => $request->buying_date,
            'expire_date'                       => $request->expire_date,
            'buying_price'                      => $request->buying_price,
            'selling_price'                     => $request->selling_price,
            'product_image'                     => $file_name,
        ]);

        $notification = array(
            'message'       => 'Product added',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('backend.product.edit', [
            'product'       => $product,
            'categories'    => $categories,
            'suppliers'     => $suppliers,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_name'          => 'required',
            'product_garage'        => 'required',
            'product_store'         => 'required',
            'buying_date'           => 'required',
            'expire_date'           => 'required',
            'buying_price'          => 'required',
            'selling_price'         => 'required',
            'category_id'           => 'required',
            'supplier_id'           => 'required',
        ]);

        $product_code = IdGenerator::generate(['table' => 'products', 'length' => 4, 'field' => 'product_code', 'prefix' => 'PC']);

        if ($request->product_image == '') {
            Product::find($request->id)->update([
                'product_name'                      => $request->product_name,
                'product_code'                      => $product_code,
                'product_garage'                    => $request->product_garage,
                'product_store'                     => $request->product_store,
                'category_id'                       => $request->category_id,
                'supplier_id'                       => $request->supplier_id,
                'buying_date'                       => $request->buying_date,
                'expire_date'                       => $request->expire_date,
                'buying_price'                      => $request->buying_price,
                'selling_price'                     => $request->selling_price,
                'created_at'                        => Carbon::now(),
            ]);

            $notification = array(
                'message'       => 'Product updated',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        }

        // else
        else {

            $product_image = Product::find($request->id)->product_image;
            $deleted_from = public_path('/uploads/product/' . $product_image);
            unlink($deleted_from);

            $image = $request->file('product_image');
            $extension = $image->getClientOriginalExtension();
            $file_name = hexdec(uniqid()) . '.' . $extension;
            Image::make($image)->save(public_path('/uploads/product/' . $file_name));


            Product::find($request->id)->update([
                'product_name'                      => $request->product_name,
                'product_code'                      => $product_code,
                'product_garage'                    => $request->product_garage,
                'product_store'                     => $request->product_store,
                'category_id'                       => $request->category_id,
                'supplier_id'                       => $request->supplier_id,
                'buying_date'                       => $request->buying_date,
                'expire_date'                       => $request->expire_date,
                'buying_price'                      => $request->buying_price,
                'selling_price'                     => $request->selling_price,
                'product_image'                     => $file_name,
                'created_at'                        => Carbon::now(),
            ]);

            $notification = array(
                'message'       => 'Product updated',
                'alert-type'    => 'success',
            );

            return back()->with($notification);
        }
    }


    public function destroy($id)
    {
        $product_image = Product::find($id)->product_image;
        $deleted_from = public_path('/uploads/product/' . $product_image);
        unlink($deleted_from);

        // dd($deleted_from);

        Product::find($id)->delete();

        $notification = array(
            'message'       => 'Product deleted',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }


    public function code($id)
    {
        $product = Product::find($id);

        return view('backend.product.barcode', [
            'product'       => $product,
        ]);
    }


    public function import()
    {
        return view('backend.product.import');
    }

    public function import_store(Request $request)
    {

        Excel::import(new ProductImport, $request->file('import_file'));

        $notification = array(
            'message'       => 'Product Imported Successfully!',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }

    public function export()
    {
        // return Excel::download(new ProductExport, 'product.csv');
        return Excel::download(new ProductExport, 'product.xlsx');
    }

    public function inventory($id)
    {
        $product = Product::find($id);
        $branches = Branch::all();
        $colors = Color::all();
        $sizes = Size::all();

        return view('backend.product.inventory', [
            'product'       => $product,
            'branches'      => $branches,
            'colors'        => $colors,
            'sizes'         => $sizes,
        ]);
    }


    public function inventory_store(Request $request)
    {
        $request->validate([
            'branch_id'     => 'required',
            'color_id'      => 'required',
            'quantity'      => 'required',
            'size_id'       => 'required',
        ]);

        $productId = $request->id;

        if (Inventory::where('color_id', $request->color_id)->where('size_id', $request->size_id)->where('branch_id', $request->branch_id)->exists()) {
            echo 'ase';
        }

        die();
        Inventory::create([
            'branch_id'         => $request->branch_id,
            'color_id'          => $request->color_id,
            'size_id'           => $request->size_id,
            'quantity'          => $request->quantity,
            'product_id'        => $productId,
        ]);


        $notification = array(
            'message'       => 'Inventory Added Successfully!',
            'alert-type'    => 'success',
        );

        return back()->with($notification);
    }
}
