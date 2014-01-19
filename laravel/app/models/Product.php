<?php
class Product extends Eloquent {
    
    protected $table = 'products';
    protected $fillable = array('display_count', 'title', 'description', 'group_id');

    /**
     * One product belongs to a group
     * @return Group 
     */
    public function group()
    {
        return $this->belongsTo('Group');
    }
    
    /**
     * bump the display count 
     */
    public function incrementDisplayCount() {
        $this->display_count++;
        $this->save();
        return $this;
    }    
}
