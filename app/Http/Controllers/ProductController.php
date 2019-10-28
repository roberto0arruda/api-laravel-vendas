<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\ProductUpdateFormRequest;
use App\Product;

class ProductController extends Controller
{
    public function new(ProductFormRequest $request)
    {
        $product = new Product();

        $product->name         = $request->name;
        $product->cod_product  = $request->cod_product;
        $product->price        = $this->priceToDecimal($request->price);

        $product->save();
    }

    public function update(ProductUpdateFormRequest $request, $id)
    {
        $product = Product::find($id);

        $product->name         = $request->name;
        $product->cod_product  = $request->cod_product;
        $product->price        = $this->priceToDecimal($request->price);


        $product->save();
    }

    public function getProducts()
    {
        return Product::orderByDesc('id')->paginate(10);
    }

    public function destroy ($id)
    {
        Product::find($id)->delete();
    }

    private function priceToDecimal($valor)
    {
        $valor	=	str_replace('R$','',$valor);
        $valor	=	str_replace('.','',$valor);
        $valor	=	str_replace(',','.',$valor);

        return trim($valor);
    }
}
