<?php
class Group extends Eloquent {
    
    protected $table = 'groups';
    protected $fillable = array('display_count', 'name', 'description');

    /**
     * One group has many products
     * @return Products 
     */
    public function products()
    {
        return $this->hasMany('Product');
    }    
    
    /**
     * bump the display count 
     */
    public function incrementDisplayCount() {
        $this->display_count++;
        return $this;
    }
}
