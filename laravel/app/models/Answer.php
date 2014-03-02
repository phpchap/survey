<?php

class Answer extends Eloquent {

    protected $table = 'answers';

    /**
     * One group has many products
     * @return Products
     */
    public function report()
    {
        return $this->hasOne('Report');
    }
}
