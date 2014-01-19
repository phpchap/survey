<?php

class HomeController extends BaseController {
    
    protected $products;
    protected $reports;
    protected $layout = 'layouts.master';

    public function __construct(ProductRepository $products, EloquentReportRepository $reports) {
        $this->products = $products;
        $this->reports = $reports;
    }

    public function home() {
        $this->layout->content = View::make('home');        
    }

    public function aboutUs() {
        $this->layout->content = View::make('about-us');
    }

    public function thanks() {
        $this->layout->content = View::make('thanks');
    }

    public function showProducts() {

        $this->product = $this->products->getNext();

        if (Input::has('id')) {

            $input = Input::all();
            $product = $this->products->fetchProductByIdAndHash($input['id'], $input['hash']);

            if(is_object($product)) {

                $report = $this->reports->fetchReport(session_id(), $product);
                $report->saveProduct($product, $input);
                $this->product = $this->products->getNext($product->id);

            } else {
                throw new Exception("Could not find product");
            }
        }

        if(!is_object($this->product)) {
            return Redirect::to('/thanks');
        }

        $this->product->incrementDisplayCount();
        $this->layout->content = View::make('products', array('product' => $this->product));
        
    }    
}