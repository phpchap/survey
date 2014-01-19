<?php

class GroupTest extends TestCase {

    protected $groupRepo;

    public function tearDown() {
        Mockery::close();
    }

    public function setUp() {

        parent::setUp();
        
        $this->groupRepo = new EloquentGroupRepository;
        
        Artisan::call('migrate:refresh');
        $this->seed('ProductChooserSeeder');
    }

    /**
     * get all the groups 
     */
    public function testGetAllGroups() {
        $this->groupRepo = new EloquentGroupRepository;
        $this->assertEquals(3, count($this->groupRepo->all()));
    }

    /**
     * get the first group 
     */
    public function testGetFirstGroup() {
        $firstGroup = $this->groupRepo->getNextGroup();
        $this->assertEquals(1, $firstGroup->id);
        $this->assertEquals(2, count($firstGroup->products));                
    }
        
    /**
     * get the next group 
     */
    public function testGetNextGroup() {
        $firstGroup = $this->groupRepo->find(1);
        $this->assertEquals(1, $firstGroup->id);
        $this->assertEquals(2, count($firstGroup->products));
        
        $nextGroup = $this->groupRepo->getNextGroup($firstGroup->id);
        $this->assertEquals(2, $nextGroup->id);
        $this->assertEquals(2, count($nextGroup->products));        
    }

    /**
     * get the previous group 
     */
    public function testGetPreviousGroup() {
        $secondGroup = $this->groupRepo->find(2);
        $this->assertEquals(2, $secondGroup->id);

        $prevGroup = $this->groupRepo->getPreviousGroup($secondGroup->id);
        $this->assertEquals(1, $prevGroup->id);
    }

    /**
     * bump the view count 
     */
    public function testBumpGroupViewCount() {

        $group = $this->groupRepo->find(1);
        $this->assertEquals(0, $group->display_count);
        
        // bump from model
        $group->incrementDisplayCount();
        $this->assertEquals(1, $group->display_count);
        $group->save();

        unset($group);
        
        // bump from repo
        $group = $this->groupRepo->updateGroupDisplayCount(1);
        $this->assertEquals(2, $group->display_count);
        
        // reset count
        $group->display_count = 0;
        $group->save();
    }

}