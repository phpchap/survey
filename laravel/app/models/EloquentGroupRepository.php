<?php

class EloquentGroupRepository implements GroupRepository {

    public function all(){
        return Group::all();
    }
    
    public function find($groupId) {
        return Group::find($groupId);
    }
    
    public function getNextGroup($groupId = ""){
        return ($groupId == "") ? Group::all()->first() : Group::where('id', '>' , $groupId)->first();
    }
        
    public function getPreviousGroup($groupId = ""){
        return ($groupId == "") ?  Group::all()->first() : Group::where('id', '<' , $groupId)->first();        
    }    
    
    public function updateGroupDisplayCount($groupId){
        $group = $this->find($groupId);
        return (is_object($group)) ? $group->incrementDisplayCount() : false;        
    }
}
