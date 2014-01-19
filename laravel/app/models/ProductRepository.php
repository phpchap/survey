<?php

interface ProductRepository {
    public function all();
    public function find($id);   
    public function getNext($id = "");
    public function getPrevious($id = "");
    public function updateDisplayCount($id);
}

?>
