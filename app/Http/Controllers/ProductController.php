<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; //notre model Product
use App\ProductLog; //notre model Productlog
use App\Category; //notre model Productlog
use App\CategoryProduct; //notre model CategoryProduct
use Auth;// pour pouvoir envoyer l user_id a la table Products
use App\Http\Requests\ProductRequest; //injecter notre request validation 
use App\Http\UploadedFile; //
class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //listing of Cv
    public function index(){
        $listProduct=Product::All();
        //$listcv=Auth::user()->cvs;
        //product.index signifie la vue index.blade qui se trouve dans le dossier product
    	return view('products.index',['products'=>$listProduct]);
    }
    //form de creation de product
    public function create(){
        //product.create signifie la vue create.blade qui se trouve dans le dossier product
        $cats=Category::All();
        //$cats->dump();
        //echo '<pre>';print_r(compact($cats));echo '</pre>'; die();
        
    	return view('products.create', array("cats"=>$cats));
    }

    //enregistrer un product
    public function store(ProductRequest $request){
    	$product = new Product();
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->qte = $request->input("qte");
        if($request->hasFile('image')){ 
            $product->image=$request->image->store('images'); // images c est le nom du dossier
        }
        $product->save();

        $Productlog=new ProductLog();
        $Productlog->product_id= $product->id;
        $Productlog->user_id= Auth::user()->id;
        $Productlog->save();

        $catProd = new CategoryProduct();
        $catProd->category_id=$request->category;
        $catProd->product_id=$product->id;
        $catProd->save();
        
        session()->flash("success", "Product has been added successfully.");
        return redirect('products');
    }

    //get product et edit
    public function edit($id){
    	$product=Product::find($id);
        //product.edit signifie la vue edit.blade qui se trouve dans le dossier product
        return view('products.edit', ['product'=>$product]);
    }

    //show product
    public function show($id){
        $product=Product::find($id);
        return view('products.details', ['product'=>$product]);
    }

    //update product
    public function update(ProductRequest $request, $id){
    	$product=Product::find($id);
        $product->name = $request->input("name");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->qte = $request->input("qte");
        if($request->hasFile('image')){ 
            $product->image=$request->image->store('image'); // image c est le nom du dossier qui va stocker image
        }
        $product->save();
        session()->flash("success", "The product has been successfully updated !");
        return redirect('products');
    }

    //delete product
    public function destroy(Request $request, $id){
    	$product=Product::find($id)->delete();
        session()->flash("success", "The product has been deleted successfully !");
        return redirect('products');
    }

}
