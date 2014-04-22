<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<table border="1">
    <tr>
        <td>Gifting Survey</td>
        <?php for($i = 1; $i<=77; $i++) { ?>
            <td>#</td>
        <?php } ?>
        <td>Product Survey</td>
        <?php for($i = 1; $i<=1131; $i++) { ?>
            <td>#</td>
        <?php } ?>

    </tr>
    <tr>
        <td>Respondant</td>
        <td>Email</td>
        <td>Opt-in</td>
        <?php $qSize = 0; ?>
        <?php $pqSize = 0; ?>
        <?php foreach($questionsAr as $id => $questions) { ?>
            <td><?php print($questions); ?></td>
            <?php for($i = 1; $i<= ($sizeAnswers[$id] - 1); $i++) { ?>
                <td>#</td>
            <?php $qSize++; } ?>
        <?php $qSize++; } ?>
        <?php foreach($productArray as $id => $product) { ?>
            <td><?php echo "(".$product->id.") ".stripslashes($product->title); ?></td>
            <?php for($x = 1; $x <= 9; $x++) { ?>
            <td>#</td>
            <?php } ?>
        <?php $pqSize++; } ?>
    </tr>

    <tr>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <?php foreach($q1Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q2Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q3Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q4Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q5Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q6Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q7Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q8Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q9Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q10Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach(array('Freetext') as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach(array('Freetext') as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q13Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q14Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q15Ar as $q) { echo "<td>".$q."</td>"; } ?>
        <?php foreach($q16Ar as $q) { echo "<td>".$q."</td>"; } ?>

        <?php for($i = 1; $i <= 113; $i++) { ?>

            <td>1) What do you think about this?</td>
            <td>#</td>
            <td>#</td>
            <td>2) Please choose all that apply</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>#</td>
            <td>3) The most I would pay for this is</td>
            <td>4) Do you have feedback on this product?</td>

        <?php } ?>

    </tr>

    <tr>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <?php for($i = 1; $i<=77; $i++) { ?>
            <td>#</td>
        <?php } ?>

        <?php for($i = 1; $i <= 113; $i++) { ?>

            <td>I don't really like this</td>
            <td>It's OK</td>
            <td>It's great</td>

            <td>I would buy this for a friend</td>
            <td>I would buy this for someone in my family</td>
            <td>I'd quite like this for myself</td>
            <td>I'd like to buy this for someone right now</td>
            <td>I've seen this product before</td>

            <td>£</td>

            <td>Feedback</td>

        <?php } ?>
    </tr>

    <?php
    $filter = (!empty($_GET['finished']) && $_GET['finished'] == 'yes') ? " and step = 'finished' " : "";
    $sql = "SELECT * FROM reports where 1=1 " . $filter . " and step != ''";
    $reports = DB::select( DB::raw($sql));

    if(count($reports) > 0) {

        foreach($reports as $report) {

            $answers = 0;

            // general questions first
            echo "<tr><td>".$report->id."). IP: ".$report->ip." Started (".date("d/m/Y H:i:s", strtotime($report->created_at)).") Ended (".date("d/m/Y H:i:s", strtotime($report->updated_at)).")</td>";
            echo "<td>".$report->email."</td>";
            echo "<td>".$report->opt_in."</td>";

            $userAnswers = DB::select( DB::raw("select id,question_number,answer_index,answer from answers where report_id = ".$report->id." order by question_number asc"));

            if(!empty($userAnswers)) {

                foreach($userAnswers as $userAnswer) {

                    $anAr = array();

                    if(isset($userAnswer->answer_index)) {
                        if(stripos(str_replace(" ","",$userAnswer->answer_index), ",") !== false) {
                            $anAr = explode(",", $userAnswer->answer_index);
                        } else {
                            $anAr = array($userAnswer->answer_index);
                        }
                    }

                    for($i = 0; $i <= count($answersAr[$userAnswer->question_number]) - 1; $i++) {
                        if(($userAnswer->question_number == 11) || ($userAnswer->question_number == 12) && ($userAnswer->answer_index == 0 )) {
                            $answers++;
                            echo "<td>".$userAnswer->answer."</td>";
                        } else if( $i == 0 && ($userAnswer->question_number == 8 || $userAnswer->question_number == 9) && ($userAnswer->answer_index == 0 || $userAnswer->answer_index == "")) {
                            $answers++;
                            echo "<td>".$userAnswer->answer."</td>";
                        } else if(in_array($i, $anAr)) {
                            $answers++;
                            echo "<td>1</td>";
                        } else {
                            $answers++;
                            echo "<td>#</td>";
                        }
                    }
                }
            }

            // then product questions
            $sql = "select product_id,report_id,answer_one_index,answer_two_index,answer_three,answer_four from product_answers where report_id = ".$report->id." order by product_id asc";
            $productAnswers = DB::select( DB::raw($sql));

            if(!empty($productAnswers)) {

                unset($userProductAnswer);

                foreach($productAnswers as $productAnswer) {
                    $product = ($productArray[$productAnswer->product_id]);
                    $userProductAnswer[$product->id] = $productAnswer;
                }

                foreach($productArray as $id => $product) {

                    if(!empty($userProductAnswer[$id])) {

                        $userAnswer = $userProductAnswer[$id];

                        // first question
                        foreach(array(1,2,3) as $qq) {

                            if(isset($userAnswer->answer_one_index) && $userAnswer->answer_one_index == $qq) {
                                echo "<td>1</td>";
                                $answers++;
                            } else {
                                echo "<td>#</td>";
                                $answers++;
                            }
                        }

                       // second question
                        foreach(array(0,1,2,3,4) as $qqq) {

                            $found = false;
                            $answerTwo = (string)$userAnswer->answer_two_index;

                            if(strlen($answerTwo) > 0) {

                                if (stripos($answerTwo, ",") !== false) {

                                    foreach(explode(", ", $answerTwo) as $exa) {

                                        // ??? wtf..
                                        if($exa == $qqq) {
                                            $found = true;
                                        }
                                    }

                                    if($found) {
                                        echo "<td>1</td>";
                                        $answers++;
                                    } else {
                                        echo "<td>#</td>";
                                        $answers++;
                                    }

                                } else {

                                    if($qqq == $answerTwo) {
                                        $answers++;
                                        echo "<td>1</td>";
                                    } else {
                                        $answers++;
                                        echo "<td>#</td>";
                                    }
                                }
                            } else {
                                echo "<td>#</td>";
                                $answers++;
                            }
                        }


                        if(isset($userAnswer->answer_three)) {

                            echo "<td>£".$userAnswer->answer_three."</td>";
                        } else {
                            $answers++;
                            echo "<td>#</td>";
                        }

                        if(!empty($userAnswer->answer_four)) {
                            $answers++;
                            echo "<td>".$userAnswer->answer_four."</td>";
                        } else {
                            $answers++;
                            echo "<td>#</td>";
                        }

                    } else {
                        for($i = 1; $i <= 10; $i++) {
                            $answers++;
                            echo "<td>#</td>";
                        }
                    }
                }
            }
            // for people who dont finish, fill out the rest of the table
            if($answers < 1179) {
                $unanswered = (1179 - $answers);
                for($i = 1; $i <= $unanswered; $i++) {
                    echo "<td>#</td>";
                }
            }
        }
    }


    ?>

</table>