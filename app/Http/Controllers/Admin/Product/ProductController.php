<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Slug\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::orderBy("id", "DESC")->paginate(5);
        return view("backend/products/listproduct", ["products"=>$products]);
    }
    public function create(){

        $categories = Category::all()->toArray();
        return view("backend/products/addproduct", ["categories"=>$categories]);
    }
    public function store(ProductRequest $ProductRequest){
        if($ProductRequest->hasFile("image")){
            $file = $ProductRequest->image;
            $fileExtension = $file->getClientOriginalExtension();
            $file->move("uploads", Slug::getSlug($ProductRequest->name).".".$fileExtension);
        }

        $product = new Product();
        $product->name = $ProductRequest->name;
        $product->code = $ProductRequest->code;
        $product->slug = Slug::getSlug($ProductRequest->name);
        $product->info = $ProductRequest->info;
        $product->describer = $ProductRequest->describer;
        $product->image = Slug::getSlug($ProductRequest->name).".".$fileExtension;
        $product->price = $ProductRequest->price;
        $product->featured = $ProductRequest->featured;
        $product->state = $ProductRequest->state;
        $product->categories_id = $ProductRequest->categories_id;
        $product->save();

        $ProductRequest->session()->flash("alert", "Đã thêm thành công");

        return redirect("/admin/product");
    }
    public function edit($id)
    {
        
        $categories = Category::all()->toArray();
        $product = Product::where("id", $id)->get()->toArray();
        return view("backend/products/editproduct", ["product"=>$product[0], "categories"=>$categories]);
    } 
    public function update(EditProductRequest $editProductRequest, $id){
        $product = Product::find($id);
        $product->update($editProductRequest->all());
        $editProductRequest->session()->flash("alert", "Đã sửa thành công !");
        return redirect("/admin/product");
    }
    public function delete(Request $request, $id){
        $product = Product::find($id);
        $product->delete();
        $request->session()->flash("alert", "Đã xóa thành công !");
        return redirect("/admin/product");
    }
}
