<?php

interface GroupRepository {
    public function all();
    public function find($groupId);   
    public function getNextGroup($groupId = "");
    public function getPreviousGroup($groupId = "");
    public function updateGroupDisplayCount($groupId);
}

?>
