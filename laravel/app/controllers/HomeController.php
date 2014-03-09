<?php

class HomeController extends BaseController {
    
    protected $products;
    protected $reports;
    protected $layout = 'layouts.master';

    public function __construct(ProductRepository $products, EloquentReportRepository $reports) {
        $this->products = $products;
        $this->reports = $reports;
    }

    public function survey()
    {

        // have we finished?
        if( Session::has('completed_product_questions') && Session::get('completed_product_questions') == true &&
            Session::has('completed_questions') && Session::get('completed_questions') == true)
        {
            return Redirect::to('/thanks');
        }

        $report = $this->reports->fetchReport(session_id());

        if($report->session_id == null) {
            $report->session_id = session_id();
            $report->ip = $_SERVER['REMOTE_ADDR'];
            $report->save();
        }

        $questionsAr[1]="1. How old are you?";
        $questionsAr[2]="2. Please state your gender";
        $questionsAr[3]="3. How easy is it for you to shop for a gift during the week?";
        $questionsAr[4]="4. How easy is it for you to shop for wrapping paper & cards during the week? Tick all that apply";
        $questionsAr[5]="5. Who do you buy gifts for? Please tick all that apply";
        $questionsAr[6]="6. How often do you buy gifts online?";
        $questionsAr[7]="7. How often do you treat yourself to a present online?";
        $questionsAr[8]="8. Do you ever purchased wrapping paper online?";
        $questionsAr[9]="9. Do you ever purchase greetings cards online?";
        $questionsAr[10]="10. Do you usually buy wrapping paper & cards at the same time as the corresponding gift?";
        $questionsAr[11]="11. What would make you more inclined to buy gifts online?";
        $questionsAr[12]="12. What would make you more inclined to buy greetings cards / wrapping paper online?";
        $questionsAr[13]="13. Are you likely to purchase any of the following in the next 12 months?";
        $questionsAr[14]="14. Which of the following types of gifts do you buy?";
        $questionsAr[15]="15. How often do you buy gift tags, bows or ribbons for your presents?";
        $questionsAr[16]="16. Which of the following best describes your approach to present wrapping?";

        // do we pages
        if (Session::has('page') && Session::has('nextPage'))
        {
            // get the question
            $page = Session::get('page');
            $nextPage = Session::get('nextPage');

        } else {

            // this is the first time viewed so lets set the page/next page
            $page = 1;
            $nextPage = 2;

        }

        // answers for q1
        $q1Ar[] = "Under 18";
        $q1Ar[] = "18 - 24";
        $q1Ar[] = "25 - 33";
        $q1Ar[] = "34 - 44";
        $q1Ar[] = "45 - 54";
        $q1Ar[] = "55 - 65";
        $q1Ar[] = "Over 65";

        // answers for q2
        $q2Ar[] = "Male";
        $q2Ar[] = "Female";

        // answers for q3
        $q3Ar[] = "Very easy, as I live/work near shops";
        $q3Ar[] = "Very easy, I purchase online";
        $q3Ar[] = "Not very easy, as I work long hours";
        $q3Ar[] = "Not very easy, as I don’t live/work near shops";
        $q3Ar[] = "Not very easy, as the shops near me aren’t very good";
        $q3Ar[] = "I prefer to purchase gifts at the weekend";

        // answers for q4
        $q4Ar[] = "Very easy, as I live/work near card shops";
        $q4Ar[] = "Very easy, I purchase online";
        $q4Ar[] = "Not very easy, as I work long hours";
        $q4Ar[] = "Not very easy, as I don’t live/work near card shops";
        $q4Ar[] = "Not very easy, as the card shops near me aren’t very good";
        $q4Ar[] = "I prefer to purchase wrapping paper/cards at the weekend";

        // answers for q5
        $q5Ar[] = "Friends";
        $q5Ar[] = "Family";
        $q5Ar[] = "Partners";
        $q5Ar[] = "Myself";
        $q5Ar[] = "No one";

        // answers for q6
        $q6Ar[] = "Never";
        $q6Ar[] = "Once a year";
        $q6Ar[] = "Every few months";
        $q6Ar[] = "Every month";
        $q6Ar[] = "Every week";

        // answer for q7
        $q7Ar[] = "Never";
        $q7Ar[] = "Once a year";
        $q7Ar[] = "Every few months";
        $q7Ar[] = "Every month";
        $q7Ar[] = "Every week";

        // answer for q8
        $q8Ar[] = "Never";
        $q8Ar[] = "Occasionally";
        $q8Ar[] = "Often";

        // answer for q9
        $q9Ar[] = "Never";
        $q9Ar[] = "Occasionally";
        $q9Ar[] = "Often";

        // answer for q10
        $q10Ar[] = "Yes";
        $q10Ar[] = "No";

        // answer for q13
        $q13Ar[] = "Birthday gifts";
        $q13Ar[] = "Christmas gifts";
        $q13Ar[] = "New Baby gifts";
        $q13Ar[] = "Wedding gifts";
        $q13Ar[] = "Valentines gifts";
        $q13Ar[] = "New home gifts";
        $q13Ar[] = "Anniversary gifts";
        $q13Ar[] = "Thank you gifts";
        $q13Ar[] = "Halloween gift";
        $q13Ar[] = "Not planning on buying any gifts";

        // answer for q14
        $q14Ar[] = "Books";
        $q14Ar[] = "Jewellery";
        $q14Ar[] = "Candles";
        $q14Ar[] = "Toiletries";
        $q14Ar[] = "Purses / Tote bags";
        $q14Ar[] = "Home accessories";
        $q14Ar[] = "Garden accessories";
        $q14Ar[] = "Stationary";
        $q14Ar[] = "Toys and games";
        $q14Ar[] = "Art prints";
        $q14Ar[] = "None of the above";

        // answer for q15
        $q15Ar[] = "Every time that I buy wrapping paper";
        $q15Ar[] = "Very often";
        $q15Ar[] = "Not very often";
        $q15Ar[] = "Never";

        // answers for q16
        $q16Ar[] = "I like to spend time selecting wrapping paper, accessories & wrapping my presents";
        $q16Ar[] = "I tend to use whatever wrapping paper I have already";
        $q16Ar[] = "I prefer not to wrap presents, as I can’t be bothered";
        $q16Ar[] = "I prefer not to wrap presents, as I don’t have the time";
        $q16Ar[] = "I prefer gift bags";
        $q16Ar[] = "I wish I was better at wrapping presents, but I’m not sure how to do it properly";

        $validationErrorAr = array();

        // first questions
        if ($page == 1 && Input::has('s') || Input::has('q1') && Input::has('q2') && Input::has('q3'))
        {
            $input = Input::all();

            /////////////////////////////////////////

            if(!isset($input['q1'])) {

                $validationErrorAr["q1"] = "Please answer question 1";

            } else {

                $q1 = $input['q1'];
                $q1IdxAr = array();

                foreach($q1Ar as $idx => $v) {
                    if($v == $q1) {
                        $q1IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 1, $questionsAr[1], $q1, implode(", ", $q1IdxAr));

            }

            /////////////////////////////////////////

            if(!isset($input['q2'])) {
                $validationErrorAr["q2"] = "Please answer question 2";
            } else {

                $q2 = $input['q2'];
                $q2IdxAr = array();

                foreach($q2Ar as $idx => $v) {
                    if($v == $q2) {
                        $q2IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 2, $questionsAr[2], $q2, implode(", ", $q2IdxAr));
            }

            /////////////////////////////////////////

            if(!isset($input['q3'])) {
                $validationErrorAr["q3"] = "Please answer question 3";
            } else {

                $q3 = $input['q3'];
                $q3IdxAr = array();

                foreach($q3Ar as $idx => $v) {
                    foreach($q3 as $q3a) {
                        if($v == $q3a) {
                            $q3IdxAr[] = $idx;
                        }
                    }
                }

                $this->reports->doAnswer($report->id, 3, $questionsAr[3], implode(", ", $q3), implode(", ", $q3IdxAr));
            }

            // if we don't have any validation errors then proceed
            if(empty($validationErrorAr)) {
                // bump the next page
                $page = 2;
                $nextPage = 3;

                $report->step = $nextPage;
                $report->save();

                // set the page in the session
                Session::set('page', $page);
                Session::set('nextPage', $nextPage);
            }

        // second questions
        } else if ($page == 2 && Input::has('s') || Input::has('q4') && Input::has('q5') && Input::has('q6')) {

            $input = Input::all();

            /////////////////////////////////////////

            if(!isset($input['q4'])) {

                $validationErrorAr["q4"] = "Please answer question 4";

            } else {

                $q4 = $input['q4'];
                $q4IdxAr = array();

                foreach($q4Ar as $idx => $v) {
                    foreach($q4 as $q4a) {
                        if($v == $q4a) {
                            $q4IdxAr[] = $idx;
                        }
                    }
                }

                $this->reports->doAnswer($report->id, 4, $questionsAr[4], implode(", ", $q4), implode(", ", $q4IdxAr));

            }

            /////////////////////////////////////////

            if(!isset($input['q5'])) {

                $validationErrorAr["q5"] = "Please answer question 5";

            } else {

                $q5 = $input['q5'];
                $q5IdxAr = array();

                foreach($q5Ar as $idx => $v) {
                    foreach($q5 as $q5a) {
                        if($v == $q5a) {
                            $q5IdxAr[] = $idx;
                        }
                    }
                }

                $this->reports->doAnswer($report->id, 5, $questionsAr[5], implode(", ", $q5), implode(", ", $q5IdxAr));

            }

            /////////////////////////////////////////

            if(!isset($input['q6'])) {

                $validationErrorAr["q6"] = "Please answer question 6";

            } else {

                $q6 = $input['q6'];
                $q6IdxAr = array();

                foreach($q6Ar as $idx => $v) {
                    if($v == $q6) {
                        $q6IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 6, $questionsAr[6], $q6, implode(", ", $q6IdxAr));

            }

            // if we don't have any validation errors then proceed to the next step
            if(empty($validationErrorAr)) {

                // bump the next page
                $page = 3;
                $nextPage = 4;

                $report->step = $nextPage;
                $report->save();

                // set the page in the session
                Session::set('page', $page);
                Session::set('nextPage', $nextPage);
            }

        // third questions
        } else if ($page == 3 && Input::has('s') || Input::has('q7') && Input::has('q8') && Input::has('q9')) {

            $input = Input::all();

            /////////////////////////////////////////

            if(!isset($input['q7'])) {

                $validationErrorAr["q7"] = "Please answer question 7";

            } else {
                $q7 = $input['q7'];
                $q7IdxAr = array();

                foreach($q7Ar as $idx => $v) {
                    if($v == $q7) {
                        $q7IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 7, $questionsAr[7], $q7, implode(", ", $q7IdxAr));
            }

            /////////////////////////////////////////


            if(!isset($input['q8'])) {

                $validationErrorAr["q8"] = "Please answer question 8";

            } else {
                $q8 = $input['q8'];
                if($q8 != "Never") {

                    $q8IdxAr = array();

                    foreach($q8Ar as $idx => $v) {
                        if($v == $q8) {
                            $q8IdxAr[] = $idx;
                        }
                    }
                } else {
                    $q8IdxAr = array(3);
                    $q8 = $input['q8_why'];
                }

                $this->reports->doAnswer($report->id, 8, $questionsAr[8], $q8, implode(", ", $q8IdxAr));
            }

            /////////////////////////////////////////
            if(!isset($input['q9'])) {

                $validationErrorAr["q9"] = "Please answer question 9";

            } else {
                $q9 = $input['q9'];
                if($q9 != "Never") {

                    $q9IdxAr = array();

                    foreach($q9Ar as $idx => $v) {
                        if($v == $q9) {
                            $q9IdxAr[] = $idx;
                        }
                    }
                } else {
                    $q9IdxAr = array(3);
                    $q9 = $input['q9_why'];
                }

                $this->reports->doAnswer($report->id, 9, $questionsAr[9], $q9, implode(", ", $q9IdxAr));
            }

            // if theres not validation errors then proceed
            if(empty($validationErrorAr)) {

                // bump the next page
                $page = 4;
                $nextPage = 5;

                $report->bumpStep();
                $report->save();

                // set the page in the session
                Session::set('page', $page);
                Session::set('nextPage', $nextPage);
            }

        // fourth questions
        } else if ($page == 4 && Input::has('s') || Input::has('q10') && Input::has('q11') && Input::has('q12')) {

            $input = Input::all();

            /////////////////////////////////////////

            if(!isset($input['q10'])) {

                $validationErrorAr["q10"] = "Please answer question 10";

            } else {

                $q10 = $input['q10'];
                $q10IdxAr = array();

                foreach($q10IdxAr as $idx => $v) {
                    if($v == $q10) {
                        $q10IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 10, $questionsAr[10], $q10, implode(", ", $q10IdxAr));

            }

            /////////////////////////////////////////

            if(empty($input['q11'])) {
                $validationErrorAr["q11"] = "Please answer question 11";
            } else {
                $q11 = $input['q11'];
                $this->reports->doAnswer($report->id, 11, $questionsAr[11], $q11, 0);
            }

            /////////////////////////////////////////
            if(empty($input['q12'])) {
                $validationErrorAr["q12"] = "Please answer question 12";
            } else {
                $q12 = $input['q12'];
                $this->reports->doAnswer($report->id, 12, $questionsAr[12], $q12, 0);
            }

            if(empty($validationErrorAr)) {

                // bump the next page
                $page = 5;
                $nextPage = 6;

                $report->step = $nextPage;
                $report->save();

                // set the page in the session
                Session::set('page', $page);
                Session::set('nextPage', $nextPage);
            }

        // fifth questions
        } else if ($page == 5 && Input::has('s') || Input::has('q13') && Input::has('q14')) {

            $input = Input::all();

            /////////////////////////////////////////
            if(empty($input['q13'])) {

                $validationErrorAr["q13"] = "Please answer question 13";

            } else {

                $q13 = $input['q13'];
                $q13IdxAr = array();

                foreach($q13Ar as $idx => $v) {
                    foreach($q13 as $q13a) {
                        if($v == $q13a) {
                            $q13IdxAr[] = $idx;
                        }
                    }
                }

                $this->reports->doAnswer($report->id, 13, $questionsAr[13], implode(", ", $q13), implode(", ", $q13IdxAr));
            }

            /////////////////////////////////////////

            if(empty($input['q14'])) {

                $validationErrorAr["q14"] = "Please answer question 14";

            } else {
                $q14 = $input['q14'];
                $q14IdxAr = array();

                foreach($q14Ar as $idx => $v) {
                    foreach($q14 as $q14a) {
                        if($v == $q14a) {
                            $q14IdxAr[] = $idx;
                        }
                    }
                }

                $this->reports->doAnswer($report->id, 14, $questionsAr[14], implode(", ", $q14), implode(", ", $q14IdxAr));
            }

            if(empty($validationErrorAr)) {

                // bump the next page
                $page = 6;
                $nextPage = 7;

                $report->step = $nextPage;
                $report->save();

                // set the page in the session
                Session::set('page', $page);
                Session::set('nextPage', $nextPage);
            }

        // sixth questions
        } else if ($page == 6 && Input::has('s') || Input::has('q15') && Input::has('q16')) {

            $input = Input::all();

            /////////////////////////////////////////

            if(empty($input['q15'])) {

                $validationErrorAr["q15"] = "Please answer question 15";

            } else {
                $q15 = $input['q15'];
                $q15IdxAr = array();

                foreach($q15Ar as $idx => $v) {
                    if($v == $q15) {
                        $q15IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 15, $questionsAr[15], $q15, implode(", ", $q15IdxAr));
            }

            /////////////////////////////////////////

            if(empty($input['q16'])) {

                $validationErrorAr["q16"] = "Please answer question 16";

            } else {
                $q16 = $input['q16'];
                $q16IdxAr = array();

                foreach($q16Ar as $idx => $v) {
                    if($v == $q16) {
                        $q16IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 16, $questionsAr[16], $q16, implode(", ", $q16IdxAr));
            }

            if(empty($validationErrorAr)) {

                $report->step = 'display_question_page';
                $report->save();

                // set the page in the session
                Session::set('display_question_page', true);

                $this->layout->content = View::make('view_products');
            }
        }

        // set the page in the session
        if(Session::has('display_question_page') && Session::get('display_question_page') == true && Input::has('c'))  {
            Session::set('completed_questions', true);
        }

        // if the user has completed the questions then show the products.
        if(Session::has('completed_questions') && Session::get('completed_questions') == true) {

            if(Session::has('current_product_id')) {
                $this->product = $this->products->find(Session::get('current_product_id'));
            } else {
                $this->product = $this->products->getNext();
            }

            $qAr[1] = "1) What do you think about this?";
            $qAr[2] = "2) Please choose all that apply";
            $qAr[3] = "3) I would buy this for";
            $qAr[4] = "4) Do you have feedback on this product?";

            $a1Ar[1] = "I don't really like this :(";
            $a1Ar[2] = "It's OK";
            $a1Ar[3] = "It's great :)";

            $a2Ar[1] = "I wouldn't buy this";
            $a2Ar[2] = "I would buy this for a friend";
            $a2Ar[3] = "I would buy this someone in my family";
            $a2Ar[4] = "I'd quite like this for myself";
            $a2Ar[5] = "I'd like to buy this for someone right now";
            $a2Ar[6] = "I've seen this product before";

            if (Input::has('id')) {

                // set the page in the session
                $input = Input::all();
                $product = $this->products->fetchProductByIdAndHash($input['id'], $input['hash']);

                if(is_object($product)) {

                    $productId = $product->id;
                    $report = $this->reports->fetchReport(session_id());

                    $q1 = $input['opinion'];

                    foreach($a1Ar as $idx => $v) {
                        if($v == $q1) {
                            $q1idx = $idx;
                        }
                    }


                    $q2 = (!empty($input['q2'])) ? $input['q2'] : array();
                    $q2idxAr = array();

                    foreach($q2 as $idx => $v) {
                        foreach($a2Ar as $q2idx => $v2) {
                            if($v == $v2) {
                                $q2idxAr[] = $idx;
                            }
                        }
                    }

                    $q3 = ($input['q3']) ? $input['q3'] : "";

                    $q4 = ($input['q4']) ? $input['q4'] : "";

                    $pa = $this->reports->doProductAnswer(
                        $report->id, $productId,  $qAr[1], $qAr[2], $qAr[3],
                        $qAr[4], $q1, $q1idx, implode(", ", $q2), implode(", ", $q2idxAr),
                        $q3, $q4
                    );

                    // move on to the next product
                    $this->product = $this->products->getNext($input['id']);

                    if(is_object($this->product)) {

                        Session::set('current_product_id', $this->product->id);
                        $report->step = "Product ID: ".$this->product->id;
                        $report->save();

                    } else {
                        // set the page in the session
                        Session::set('completed_product_questions', true);
                        return Redirect::to('/thanks');
                    }

                } else {
                    throw new Exception("Could not find product");
                }
            }

            $this->product->incrementDisplayCount();
            $this->layout->content = View::make(
                'products', array('product'     => $this->product,
                                  'questionsAr' => $questionsAr,
                                  'validationErrorAr' => $validationErrorAr)
            );


        } else {

            if( Session::has('display_question_page') && Session::get('display_question_page') == true) {
                //
                $this->layout->content = View::make('view_products');
            } else {
                $this->layout->content = View::make(
                    'questions' . $page,
                    array(
                         'validationErrorAr' => $validationErrorAr,
                         'questionsAr' => $questionsAr,
                         'q1Ar'        => $q1Ar,
                         'q2Ar'        => $q2Ar,
                         'q3Ar'        => $q3Ar,
                         'q4Ar'        => $q4Ar,
                         'q5Ar'        => $q5Ar,
                         'q6Ar'        => $q6Ar,
                         'q7Ar'        => $q7Ar,
                         'q8Ar'        => $q8Ar,
                         'q9Ar'        => $q9Ar,

                         'q10Ar'       => $q10Ar,
                         'q13Ar'       => $q13Ar,
                         'q14Ar'       => $q14Ar,
                         'q15Ar'       => $q15Ar,
                         'q16Ar'       => $q16Ar,
                    )
                );
            }
        }
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

    }    
}