<?php

class EloquentReportRepository
{

    public function all()
    {
        return Report::all();
    }

    public function find($id)
    {
        return Report::find($id);
    }

    public function fetchReport($sessionId)
    {
        $filter = "session_id = '" . $sessionId . "'";
        $report = Report::whereRaw($filter)->first();

        if(is_object($report)) {

            $productGroupId = $report->product_group_id;
            Session::set('product_group_id', $productGroupId);

            return $report;
        } else {

            $report = new Report;
            $results = DB::select( DB::raw("SELECT product_group_id FROM reports ORDER BY id DESC LIMIT 1") );

            if(empty($results) && !isset($results[0]->product_group_id)) {
                $productGroupId = 1;
            } else {

                $ar[1]=2;
                $ar[2]=3;
                $ar[3]=4;
                $ar[4]=1;

                $productGroupId = $ar[$results[0]->product_group_id];
            }

            $report->product_group_id = $productGroupId;
            $report->save();
        }

        if($report->session_id == null) {
            $report->session_id = session_id();
            $report->ip = $_SERVER['REMOTE_ADDR'];
            $report->save();
        }

        Session::set('product_group_id', $report->product_group_id);

        return $report;
    }

    /**
     * Create an answer
     *
     * @param $reportId
     * @param $questionNumber
     * @param $question
     * @param $theAnswer
     * @param $answerIndex
     *
     * @return Answer
     */
    public function doAnswer(
        $reportId, $questionNumber, $question, $theAnswer, $answerIndex
    ) {

        $filter = sprintf(
            "report_id = '%s' AND question_number = '%s'",
            $reportId,
            $questionNumber
        );

        $answer = Answer::whereRaw($filter)->first();

        if (!is_object($answer)) {
            $answer = new Answer;
        }

        $answer->report_id = $reportId;
        $answer->question_number = $questionNumber;
        $answer->question = $question;
        $answer->answer = $theAnswer;
        $answer->answer_index = $answerIndex;

        $answer->save();

        return $answer;

    }

    /**
     * @param $reportId
     * @param $productId
     * @param $question_one
     * @param $question_two
     * @param $question_three
     * @param $question_four
     * @param $answer_one
     * @param $answer_one_index
     * @param $answer_two
     * @param $answer_two_index
     * @param $answer_three
     * @param $answer_four
     *
     * @return ProductAnswer
     */
    public function doProductAnswer(
        $reportId, $productId, $question_one, $question_two, $question_three,
        $question_four, $answer_one, $answer_one_index, $answer_two,
        $answer_two_index, $answer_three, $answer_four
    ) {

        $filter = sprintf(
            "report_id = '%s' AND product_id = '%s'",
            $reportId,
            $productId
        );

        $productAnswer = ProductAnswer::whereRaw($filter)->first();

        if (!is_object($productAnswer)) {
            $productAnswer = new ProductAnswer;
        }

        $productAnswer->report_id = $reportId;
        $productAnswer->product_id = $productId;
        $productAnswer->question_one = $question_one;
        $productAnswer->question_two = $question_two;
        $productAnswer->question_three = $question_three;
        $productAnswer->question_four = $question_four;
        $productAnswer->answer_one = $answer_one;
        $productAnswer->answer_one_index = $answer_one_index;
        $productAnswer->answer_two = $answer_two;
        $productAnswer->answer_two_index = $answer_two_index;
        $productAnswer->answer_three = $answer_three;
        $productAnswer->answer_four = $answer_four;


        $productAnswer->save();

        return $productAnswer;

    }

    /**
     * Fetch a product answer
     *
     * @param $reportId
     * @param $productId
     *
     * @return bool
     */
    public function getProductAnswer($reportId, $productId)
    {
        $filter = sprintf(
            "report_id = '%s' AND product_id = '%s'",
            $reportId,
            $productId
        );

        $productAnswer = ProductAnswer::whereRaw($filter)->first();

        if(is_object($productAnswer)) {
            return $productAnswer;
        }

        return false;
    }

}
