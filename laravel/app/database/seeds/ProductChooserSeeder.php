<?php

class ProductChooserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        DB::table('groups')->delete();

        // create group 1
        Group::create(array('display_count' => 0,
                            'name' => 'Group One',
                            'description' => 'Group One'));
            
        $hash = md5(time()."dsfgbse5ysgdrthe65rt");
        
        // create product 1.1
        Product::create(array(  'display_count' => 0, 
                                'title' => 'English Bulldogs Christmas / Holiday Cards', 
                                'description' => 'English Bulldogs Christmas / Holiday Cards',
                                'hash' => $hash,
                                'product_type' => 'Card',                                    
                                'picture_url_1' => 'http://img1.etsystatic.com/033/0/8556389/il_570xN.523364889_2yoo.jpg',   
                                'picture_url_2' => 'http://img1.etsystatic.com/033/0/8556389/il_570xN.523364889_2yoo.jpg',               
                                'group_id' => 1));        
 
        // create group 2
        Group::create(array('display_count' => 0,
                            'name' => 'Group Two',
                            'description' => 'Group Two'));

        $hash = md5(time()."45yghdfsgbe56yuh");        
        
        // create product 2.1
        Product::create(array(  'display_count' => 0, 
                                'title' => '2 Necklaces - Heart', 
                                'description' => '2 Necklaces - Heart', 
                                'hash' => $hash,            
                                'product_type' => 'Necklace',                                    
                                'picture_url_1' => 'http://img0.etsystatic.com/000/1/6683692/il_570xN.302917824.jpg',         
                                'picture_url_2' => 'http://img0.etsystatic.com/000/1/6683692/il_570xN.302917824.jpg',                     
                                'group_id' => 2));        
                        
        // create group 3
        Group::create(array('display_count' => 0,
                            'name' => 'Group Three',
                            'description' => 'Group Three'));        

        $hash = md5(time()."sdfgsdfg");        
        
        // create product 3.1
        Product::create(array(  'display_count' => 0, 
                                'title' => 'Mini Burlap Banner', 
                                'description' => 'Mini Burlap Banner',
                                'hash' => $hash,            
                                'product_type' => 'Banner',                                    
                                'picture_url_1' => 'http://img0.etsystatic.com/018/0/6512103/il_570xN.497182098_oj2u.jpg',                
                                'picture_url_2' => 'http://img0.etsystatic.com/018/0/6512103/il_570xN.497182098_oj2u.jpg',                            
                                'group_id' => 3));        
                
    }
}