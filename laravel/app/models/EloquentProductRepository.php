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

    public function getProgress($id)
    {

        $p = Product::select("*");
        $g = Session::get('product_group_id');
        $c = $p->where("group_id", "=", $g);

        $r = $c->get();

        // get the size
        $resultAr['size'] = count($c->get());

        $answerPos = 1;
        $pos = 1;
        foreach($r as $rr) {
            $pid = $rr->id;

            if($pid == $id) {
                $answerPos = $pos;
                break;
            }
            $pos++;
        }

        $resultAr['answerPosition'] = $answerPos;
        $resultAr['percentage'] = round((($resultAr['answerPosition'] / $resultAr['size']) * 100));

        return $resultAr;
    }

    public function getPrevious($id = ""){

        $p = Product::select("*");
        $g = Session::get('product_group_id');
        $p->where("group_id", "=", $g);

        if($id == "") {
            $x = $p->first();
        } else {

            $x = $p->where('id', '<' , $id)->orderBy('id', 'DESC')->first();

            if($x == NULL) {
                $p = Product::select("*");
                $g = Session::get('product_group_id');
                $p->where("group_id", "=", $g);
                $x = $p->first();
            }
        }
        Session::set('current_product_id', $x->id);
        return $x;
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
