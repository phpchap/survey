<?php

class EloquentProductRepository implements ProductRepository {

    public function all(){
        return Product::all();
    }
    
    public function find($id) {
        return Product::find($id);
    }
    
    public function getNext($id = ""){

        $p = Product::select("*");
        $g = Session::get('product_group_id');
        $p->where("group_id", "=", $g);

        if($id == "") {
            return $p->first();
        } else {
            return $p->where('id', '>' , $id)->first();
        }
    }
        
    public function getPrevious($id = ""){

        $p = Product::select("*");
        $p->where("group_id", "=", Session::get('group_product_id'));

        if($id == "") {
            return $p->first();
        } else {
            return $p->where('id', '<' , $id)->first();
        }
    }    
    
    public function updateDisplayCount($id){
        $product = $this->find($id);
        return (is_object($product)) ? $product->incrementDisplayCount() : false;        
    }

    public function count(){
        return Product::all()->count();
    }

    public function fetchProductByIdAndHash($id, $hash){
        $product = Product::whereRaw('id = ? and hash = ?', array($id, $hash))->first();
        return (is_object($product)) ? $product : false;
    }
}
