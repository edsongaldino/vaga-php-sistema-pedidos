<?php

namespace App\Http\Controllers;

use App\Models\OrderProducts;
use Illuminate\Http\Request;

class OrderProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $itemCheck = $this->verificaDuplicidade($request->order_id, $request->product_id);
        if($itemCheck){

            OrderProducts::where('order_id', $itemCheck->order_id)->where('product_id', $itemCheck->product_id)->update(['quantity' => $request->quantity]);
            return redirect()->back()->with('info', 'Este produto ja está no carrinho! Alteramos somente a quantidade informada.'); 

        }

        $order_products = new OrderProducts();
        $order_products->order_id = $request->order_id;
        $order_products->product_id = $request->product_id;
        $order_products->quantity = $request->quantity;
        $order_products->price = $request->price;
        $order_products->save();

        return redirect()->back()->with('success', 'Produto Adicionado!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderProducts  $orderProducts
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProducts $orderProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderProducts  $orderProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProducts $orderProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderProducts  $orderProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProducts $orderProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderProducts  $orderProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $orderProduct = OrderProducts::where('order_id', $request->order_id)->where('product_id', $request->product_id)->delete();
        if($orderProduct):
            return true;
        else:
            $response_array['status'] = 'success';    
            echo json_encode($response_array);
        endif;
    }

    public function verificaDuplicidade($order_id, $product_id){

        $ItemOrder = OrderProducts::where('order_id', $order_id)->where('product_id', $product_id)->first();

        if(isset($ItemOrder)){
            return $ItemOrder;
        }else{
            return false;
        }
    }
}
