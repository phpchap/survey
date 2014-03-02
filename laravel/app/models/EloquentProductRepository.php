<?php

class EloquentProductRepository implements ProductRepository {

    public function all(){
        return Product::all();
    }
    
    public function find($id) {
        return Product::find($id);
    }
    
    public function getNext($id = ""){

        return ($id == "") ? Product::all()->first() : Product::where('id', '>' , $id)->first();

    }
        
    public function getPrevious($id = ""){
        return ($id == "") ? Product::all()->first() : Product::where('id', '<' , $id)->first();        
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
