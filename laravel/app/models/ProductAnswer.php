<?php

class ProductAnswer extends Eloquent {

    protected $table = 'product_answers';

    /**
     * One answer has one product
     * @return Products
     */
    public function product()
    {
        return $this->hasOne('Product');
    }

    /**
     * One answer has one report
     * @return Products
     */
    public function report()
    {
        return $this->hasOne('Report');
    }
}
