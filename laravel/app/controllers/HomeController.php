<?php

class HomeController extends BaseController {
    
    protected $products;
    protected $reports;
    protected $layout = 'layouts.master';

    public function __construct(ProductRepository $products, EloquentReportRepository $reports) {
        $this->products = $products;
        $this->reports = $reports;
    }

    public function initQandA()
    {
        $this->questionsAr[1]="1. How old are you?";
        $this->questionsAr[2]="2. Please state your gender";
        $this->questionsAr[3]="3. How easy is it for you to shop for a gift during the week?";
        $this->questionsAr[4]="4. How easy is it for you to shop for wrapping paper & cards during the week? Tick all that apply";
        $this->questionsAr[5]="5. Who do you buy gifts for? Please tick all that apply";
        $this->questionsAr[6]="6. How often do you buy gifts online?";
        $this->questionsAr[7]="7. How often do you treat yourself to a present online?";
        $this->questionsAr[8]="8. Do you ever purchased wrapping paper online?";
        $this->questionsAr[9]="9. Do you ever purchase greetings cards online?";
        $this->questionsAr[10]="10. Do you usually buy wrapping paper & cards at the same time as the corresponding gift?";
        $this->questionsAr[11]="11. What would make you more inclined to buy gifts online?";
        $this->questionsAr[12]="12. What would make you more inclined to buy greetings cards / wrapping paper online?";
        $this->questionsAr[13]="13. Are you likely to purchase any of the following in the next 12 months?";
        $this->questionsAr[14]="14. Which of the following types of gifts do you buy?";
        $this->questionsAr[15]="15. How often do you buy gift tags, bows or ribbons for your presents?";
        $this->questionsAr[16]="16. Which of the following best describes your approach to present wrapping?";


        // answers for q1
        $this->q1Ar[] = "Under 18";
        $this->q1Ar[] = "18 - 24";
        $this->q1Ar[] = "25 - 33";
        $this->q1Ar[] = "34 - 44";
        $this->q1Ar[] = "45 - 54";
        $this->q1Ar[] = "55 - 65";
        $this->q1Ar[] = "Over 65";

        // answers for q2
        $this->q2Ar[] = "Male";
        $this->q2Ar[] = "Female";

        // answers for q3
        $this->q3Ar[] = "Very easy, as I live/work near shops";
        $this->q3Ar[] = "Very easy, I purchase online";
        $this->q3Ar[] = "Not very easy, as I work long hours";
        $this->q3Ar[] = "Not very easy, as I don’t live/work near shops";
        $this->q3Ar[] = "Not very easy, as the shops near me aren’t very good";
        $this->q3Ar[] = "I prefer to purchase gifts at the weekend";

        // answers for q4
        $this->q4Ar[] = "Very easy, as I live/work near card shops";
        $this->q4Ar[] = "Very easy, I purchase online";
        $this->q4Ar[] = "Not very easy, as I work long hours";
        $this->q4Ar[] = "Not very easy, as I don’t live/work near card shops";
        $this->q4Ar[] = "Not very easy, as the card shops near me aren’t very good";
        $this->q4Ar[] = "I prefer to purchase wrapping paper/cards at the weekend";

        // answers for q5
        $this->q5Ar[] = "Friends";
        $this->q5Ar[] = "Family";
        $this->q5Ar[] = "Partners";
        $this->q5Ar[] = "Myself";
        $this->q5Ar[] = "No one";

        // answers for q6
        $this->q6Ar[] = "Never";
        $this->q6Ar[] = "Once a year";
        $this->q6Ar[] = "Every few months";
        $this->q6Ar[] = "Every month";
        $this->q6Ar[] = "Every week";

        // answer for q7
        $this->q7Ar[] = "Never";
        $this->q7Ar[] = "Once a year";
        $this->q7Ar[] = "Every few months";
        $this->q7Ar[] = "Every month";
        $this->q7Ar[] = "Every week";

        // answer for q8
        $this->q8Ar[] = "Never";
        $this->q8Ar[] = "Occasionally";
        $this->q8Ar[] = "Often";

        // answer for q9
        $this->q9Ar[] = "Never";
        $this->q9Ar[] = "Occasionally";
        $this->q9Ar[] = "Often";

        // answer for q10
        $this->q10Ar[] = "Yes";
        $this->q10Ar[] = "No";

        // answer for q13
        $this->q13Ar[] = "Birthday gifts";
        $this->q13Ar[] = "Christmas gifts";
        $this->q13Ar[] = "New Baby gifts";
        $this->q13Ar[] = "Wedding gifts";
        $this->q13Ar[] = "Valentines gifts";
        $this->q13Ar[] = "New home gifts";
        $this->q13Ar[] = "Anniversary gifts";
        $this->q13Ar[] = "Thank you gifts";
        $this->q13Ar[] = "Halloween gift";
        $this->q13Ar[] = "Not planning on buying any gifts";

        // answer for q14
        $this->q14Ar[] = "Books";
        $this->q14Ar[] = "Jewellery";
        $this->q14Ar[] = "Candles";
        $this->q14Ar[] = "Toiletries";
        $this->q14Ar[] = "Purses / Tote bags";
        $this->q14Ar[] = "Home accessories";
        $this->q14Ar[] = "Garden accessories";
        $this->q14Ar[] = "Stationary";
        $this->q14Ar[] = "Toys and games";
        $this->q14Ar[] = "Art prints";
        $this->q14Ar[] = "None of the above";

        // answer for q15
        $this->q15Ar[] = "Every time that I buy wrapping paper";
        $this->q15Ar[] = "Very often";
        $this->q15Ar[] = "Not very often";
        $this->q15Ar[] = "Never";

        // answers for q16
        $this->q16Ar[] = "I like to spend time selecting wrapping paper, accessories & wrapping my presents";
        $this->q16Ar[] = "I tend to use whatever wrapping paper I have already";
        $this->q16Ar[] = "I prefer not to wrap presents, as I can’t be bothered";
        $this->q16Ar[] = "I prefer not to wrap presents, as I don’t have the time";
        $this->q16Ar[] = "I prefer gift bags";
        $this->q16Ar[] = "I wish I was better at wrapping presents, but I’m not sure how to do it properly";

        $this->qAr[1] = "1) What do you think about this?";
        $this->qAr[2] = "2) Please choose all that apply";
        $this->qAr[3] = "3) I would buy this for";
        $this->qAr[4] = "4) Do you have feedback on this product?";

        $this->a1Ar[1] = "I don't really like this :(";
        $this->a1Ar[2] = "It's OK";
        $this->a1Ar[3] = "It's great :)";

        $this->a2Ar[1] = "I wouldn't buy this";
        $this->a2Ar[2] = "I would buy this for a friend";
        $this->a2Ar[3] = "I would buy this someone in my family";
        $this->a2Ar[4] = "I'd quite like this for myself";
        $this->a2Ar[5] = "I'd like to buy this for someone right now";
        $this->a2Ar[6] = "I've seen this product before";

    }

    public function exportAnswers()
    {
        $this->initQandA();
        $this->layout = "";

        $sizeAnswers = array();

        $sizeAnswers[1] = count($this->q1Ar);
        $sizeAnswers[2] = count($this->q2Ar);
        $sizeAnswers[3] = count($this->q3Ar);
        $sizeAnswers[4] = count($this->q4Ar);
        $sizeAnswers[5] = count($this->q5Ar);
        $sizeAnswers[6] = count($this->q6Ar);
        $sizeAnswers[7] = count($this->q7Ar);
        $sizeAnswers[8] = count($this->q8Ar);
        $sizeAnswers[9] = count($this->q9Ar);
        $sizeAnswers[10] = count($this->q10Ar);
        $sizeAnswers[11] = 1;
        $sizeAnswers[12] = 1;
        $sizeAnswers[13] = count($this->q13Ar);
        $sizeAnswers[14] = count($this->q14Ar);
        $sizeAnswers[15] = count($this->q15Ar);
        $sizeAnswers[16] = count($this->q16Ar);

        $answersAr[1] = $this->q1Ar;
        $answersAr[2] = $this->q2Ar;
        $answersAr[3] = $this->q3Ar;
        $answersAr[4] = $this->q4Ar;
        $answersAr[5] = $this->q5Ar;
        $answersAr[6] = $this->q6Ar;
        $answersAr[7] = $this->q7Ar;
        $answersAr[8] = $this->q8Ar;
        $answersAr[9] = $this->q9Ar;
        $answersAr[10] = $this->q10Ar;
        $answersAr[11] = array("Free Text Field");
        $answersAr[12] = array("Free Text Field");
        $answersAr[13] = $this->q13Ar;
        $answersAr[14] = $this->q14Ar;
        $answersAr[15] = $this->q15Ar;
        $answersAr[16] = $this->q16Ar;

        $allProducts = DB::select( DB::raw("select id,group_id,title from products order by id asc") );

        // product position array
        $productPosition = array();
        $cnt = 0;
        foreach($allProducts as $p => $i) {
            $productPosition[$i->id] = $cnt;
            $productArray[$i->id] = $i;
            $cnt++;
        }

//        $results = DB::select( DB::raw("SELECT * FROM some_table WHERE some_col = '$someVariable'") );
//        print_r($productPosition);
//die;

        $view = View::make('exportAnswers',
            array(
            'a1Ar' => $this->a1Ar,
            'a2Ar' => $this->a2Ar,
            'productPosition' => $productPosition,
            'productArray' => $productArray,
            'productQuestionAr' => $this->qAr,
            'allProducts' => $allProducts,
            'questionsAr' => $this->questionsAr,
            'sizeAnswers' => $sizeAnswers,
            'answersAr' => $answersAr,
            'q1Ar' => $this->q1Ar,
            'q2Ar' => $this->q2Ar,
            'q3Ar' => $this->q3Ar,
            'q4Ar' => $this->q4Ar,
            'q5Ar' => $this->q5Ar,
            'q6Ar' => $this->q6Ar,
            'q7Ar' => $this->q7Ar,
            'q8Ar' => $this->q8Ar,
            'q9Ar' => $this->q9Ar,
            'q10Ar' => $this->q10Ar,
            'q13Ar' => $this->q13Ar,
            'q14Ar' => $this->q14Ar,
            'q15Ar' => $this->q15Ar,
            'q16Ar' => $this->q16Ar
            )
        );

        if(!empty($_GET['e']) && $_GET['e'] = 'x') {

            $html = str_get_html($view);


            header('Content-type: application/ms-excel');
            header('Content-Disposition: attachment; filename=report'.time().'.csv');

            $fp = fopen("php://output", "w");

            foreach($html->find('tr') as $element)
            {
                $td = array();
                foreach( $element->find('th') as $row)
                {
                    $td [] = $row->plaintext;
                }
                fputcsv($fp, $td);

                $td = array();
                foreach( $element->find('td') as $row)
                {
                    $td [] = $row->plaintext;
                }
                fputcsv($fp, $td);
            }


            fclose($fp);

        } else {
            echo $view;

        }
    }

    public function survey()
    {
        if(!empty($_GET['r']) && $_GET['r']="x") {
            session_destroy();
            die;
        }

        $this->initQandA();

        // have we finished?
        if( Session::has('completed_product_questions') && Session::get('completed_product_questions') == true &&
            Session::has('completed_questions') && Session::get('completed_questions') == true)
        {
            return Redirect::to('/thanks');
        }

        $report = $this->reports->fetchReport(session_id());


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

                foreach($this->q1Ar as $idx => $v) {
                    if($v == $q1) {
                        $q1IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 1, $this->questionsAr[1], $q1, implode(", ", $q1IdxAr));

            }

            /////////////////////////////////////////

            if(!isset($input['q2'])) {
                $validationErrorAr["q2"] = "Please answer question 2";
            } else {

                $q2 = $input['q2'];
                $q2IdxAr = array();

                foreach($this->q2Ar as $idx => $v) {
                    if($v == $q2) {
                        $q2IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 2, $this->questionsAr[2], $q2, implode(", ", $q2IdxAr));
            }

            /////////////////////////////////////////

            if(!isset($input['q3'])) {
                $validationErrorAr["q3"] = "Please answer question 3";
            } else {

                $q3 = $input['q3'];
                $q3IdxAr = array();

                foreach($this->q3Ar as $idx => $v) {
                    foreach($q3 as $q3a) {
                        if($v == $q3a) {
                            $q3IdxAr[] = $idx;
                        }
                    }
                }

                $this->reports->doAnswer($report->id, 3, $this->questionsAr[3], implode(", ", $q3), implode(", ", $q3IdxAr));
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

                foreach($this->q4Ar as $idx => $v) {
                    foreach($q4 as $q4a) {
                        if($v == $q4a) {
                            $q4IdxAr[] = $idx;
                        }
                    }
                }

                $this->reports->doAnswer($report->id, 4, $this->questionsAr[4], implode(", ", $q4), implode(", ", $q4IdxAr));

            }

            /////////////////////////////////////////

            if(!isset($input['q5'])) {

                $validationErrorAr["q5"] = "Please answer question 5";

            } else {

                $q5 = $input['q5'];
                $q5IdxAr = array();

                foreach($this->q5Ar as $idx => $v) {
                    foreach($q5 as $q5a) {
                        if($v == $q5a) {
                            $q5IdxAr[] = $idx;
                        }
                    }
                }

                $this->reports->doAnswer($report->id, 5, $this->questionsAr[5], implode(", ", $q5), implode(", ", $q5IdxAr));

            }

            /////////////////////////////////////////

            if(!isset($input['q6'])) {

                $validationErrorAr["q6"] = "Please answer question 6";

            } else {

                $q6 = $input['q6'];
                $q6IdxAr = array();

                foreach($this->q6Ar as $idx => $v) {
                    if($v == $q6) {
                        $q6IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 6, $this->questionsAr[6], $q6, implode(", ", $q6IdxAr));

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

                foreach($this->q7Ar as $idx => $v) {
                    if($v == $q7) {
                        $q7IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 7, $this->questionsAr[7], $q7, implode(", ", $q7IdxAr));
            }

            /////////////////////////////////////////


            if(!isset($input['q8'])) {

                $validationErrorAr["q8"] = "Please answer question 8";

            } else {
                $q8 = $input['q8'];
                if($q8 != "Never") {

                    $q8IdxAr = array();

                    foreach($this->q8Ar as $idx => $v) {
                        if($v == $q8) {
                            $q8IdxAr[] = $idx;
                        }
                    }
                } else {
                    $q8IdxAr = array(0);
                    $q8 = $input['q8_why'];
                }

                $this->reports->doAnswer($report->id, 8, $this->questionsAr[8], $q8, implode(", ", $q8IdxAr));
            }

            /////////////////////////////////////////
            if(!isset($input['q9'])) {

                $validationErrorAr["q9"] = "Please answer question 9";

            } else {
                $q9 = $input['q9'];
                if($q9 != "Never") {

                    $q9IdxAr = array();

                    foreach($this->q9Ar as $idx => $v) {
                        if($v == $q9) {
                            $q9IdxAr[] = $idx;
                        }
                    }
                } else {
                    $q9IdxAr = array(0);
                    $q9 = $input['q9_why'];
                }

                $this->reports->doAnswer($report->id, 9, $this->questionsAr[9], $q9, implode(", ", $q9IdxAr));
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

                $this->reports->doAnswer($report->id, 10, $this->questionsAr[10], $q10, implode(", ", $q10IdxAr));

            }

            /////////////////////////////////////////

            if(empty($input['q11'])) {
                $validationErrorAr["q11"] = "Please answer question 11";
            } else {
                $q11 = $input['q11'];
                $this->reports->doAnswer($report->id, 11, $this->questionsAr[11], $q11, 0);
            }

            /////////////////////////////////////////
            if(empty($input['q12'])) {
                $validationErrorAr["q12"] = "Please answer question 12";
            } else {
                $q12 = $input['q12'];
                $this->reports->doAnswer($report->id, 12, $this->questionsAr[12], $q12, 0);
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

                foreach($this->q13Ar as $idx => $v) {
                    foreach($q13 as $q13a) {
                        if($v == $q13a) {
                            $q13IdxAr[] = $idx;
                        }
                    }
                }

                $this->reports->doAnswer($report->id, 13, $this->questionsAr[13], implode(", ", $q13), implode(", ", $q13IdxAr));
            }

            /////////////////////////////////////////

            if(empty($input['q14'])) {

                $validationErrorAr["q14"] = "Please answer question 14";

            } else {
                $q14 = $input['q14'];
                $q14IdxAr = array();

                foreach($this->q14Ar as $idx => $v) {
                    foreach($q14 as $q14a) {
                        if($v == $q14a) {
                            $q14IdxAr[] = $idx;
                        }
                    }
                }

                $this->reports->doAnswer($report->id, 14, $this->questionsAr[14], implode(", ", $q14), implode(", ", $q14IdxAr));
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

                foreach($this->q15Ar as $idx => $v) {
                    if($v == $q15) {
                        $q15IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 15, $this->questionsAr[15], $q15, implode(", ", $q15IdxAr));
            }

            /////////////////////////////////////////

            if(empty($input['q16'])) {

                $validationErrorAr["q16"] = "Please answer question 16";

            } else {
                $q16 = $input['q16'];
                $q16IdxAr = array();

                foreach($this->q16Ar as $idx => $v) {
                    if($v == $q16) {
                        $q16IdxAr[] = $idx;
                    }
                }

                $this->reports->doAnswer($report->id, 16, $this->questionsAr[16], $q16, implode(", ", $q16IdxAr));
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

            if (Input::has('id')) {

                // set the page in the session
                $input = Input::all();
                $product = $this->products->fetchProductByIdAndHash($input['id'], $input['hash']);

                if(is_object($product)) {

                    $productId = $product->id;
                    $report = $this->reports->fetchReport(session_id());

                    $q1 = $input['opinion'];

                    foreach($this->a1Ar as $idx => $v) {
                        if($v == $q1) {
                            $q1idx = $idx;
                        }
                    }

                    $q2 = (!empty($input['q2'])) ? $input['q2'] : array();
                    $q2idxAr = array();

                    foreach($q2 as $idx => $v) {
                        foreach($this->a2Ar as $q2idx => $v2) {
                            if($v == $v2) {
                                $q2idxAr[] = $idx;
                            }
                        }
                    }

                    $q3 = ($input['q3']) ? $input['q3'] : "";

                    $q4 = ($input['q4']) ? $input['q4'] : "";

                    $pa = $this->reports->doProductAnswer(
                        $report->id, $productId,  $this->qAr[1], $this->qAr[2], $this->qAr[3],
                        $this->qAr[4], $q1, $q1idx, implode(", ", $q2), implode(", ", $q2idxAr),
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
                                  'questionsAr' => $this->questionsAr,
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
                         'questionsAr' => $this->questionsAr,
                         'q1Ar'        => $this->q1Ar,
                         'q2Ar'        => $this->q2Ar,
                         'q3Ar'        => $this->q3Ar,
                         'q4Ar'        => $this->q4Ar,
                         'q5Ar'        => $this->q5Ar,
                         'q6Ar'        => $this->q6Ar,
                         'q7Ar'        => $this->q7Ar,
                         'q8Ar'        => $this->q8Ar,
                         'q9Ar'        => $this->q9Ar,
                         'q10Ar'       => $this->q10Ar,
                         'q13Ar'       => $this->q13Ar,
                         'q14Ar'       => $this->q14Ar,
                         'q15Ar'       => $this->q15Ar,
                         'q16Ar'       => $this->q16Ar,
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

        $input = Input::all();


        if(!empty($input['email'])) {

            $report         = $this->reports->fetchReport(session_id());
            $email          = $input['email'];
            $opt_in         = (!empty($input['opt_in'])) ? $input['opt_in'] : "no";
            $report->email  = $email;
            $report->opt_in = $opt_in;

            $report->save();
            Session::set('sent_details', "yes");
        }

        $sent = (Session::has('sent_details') && Session::get('sent_details') == "yes" ) ? true : false;
        $this->layout->content = View::make('thanks', array('sent' => $sent));
    }

    public function showProducts() {

    }    
}