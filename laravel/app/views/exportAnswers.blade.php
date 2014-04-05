<table border="1">
    <tr>
        <td>Gifting Survey</td>
        <?php for($i = 1; $i<=77; $i++) { ?>
            <td>#</td>
        <?php } ?>
        <td>Product Survey</td>

    </tr>
    <tr>
        <th>Respondant</th>
        <?php foreach($questionsAr as $id => $questions) { ?>
            <th><?php print($id ." -- ".$questions); ?></th>
            <?php for($i = 1; $i<= ($sizeAnswers[$id] - 1); $i++) { ?>
                <th>#</th>
            <?php } ?>
        <?php } ?>
        <?php foreach($productArray as $id => $product) { ?>
            <th><?php echo "(".$product->id.") ".$product->title; ?></th>
                <?php for($i = 1; $i<= count($productQuestionAr) - 1; $i++) { ?>
                    <th>#</th>
                <?php } ?>
        <?php } ?>
    </tr>
    <tr>
        <td>-</td>
        <?php foreach($questionsAr as $id => $questions) { ?>
            <?php foreach($answersAr[$id] as $answer) { ?>
                <td><?php echo $answer; ?></td>
            <?php } ?>
        <?php } ?>
        <?php foreach($productArray as $id => $product) { ?>
            <?php foreach($productQuestionAr as $productQuestion) { ?>
                <th><?php echo $productQuestion; ?></th>
            <?php } ?>
        <?php } ?>
    </tr>

    <?php

    $reports = DB::select( DB::raw("SELECT * FROM reports"));

    if(count($reports) > 0) {

        foreach($reports as $report) {

            // general questions first
            echo "<tr><td>".$report->id."</td>";

            $userAnswers = DB::select( DB::raw("select id,question_number,answer_index,answer from answers where report_id = ".$report->id." order by question_number asc"));

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
                        echo "<td>".$userAnswer->answer."</td>";
                    } else if( $i == 0 && ($userAnswer->question_number == 8 || $userAnswer->question_number == 9) && ($userAnswer->answer_index == 0 || $userAnswer->answer_index == "")) {
                        echo "<td>".$userAnswer->answer."</td>";
                    } else if(in_array($i, $anAr)) {
                        echo "<td>1</td>";
                    } else {
                        echo "<td>#</td>";
                    }
                }
            }

            // then product questions
            $sql = "select product_id,report_id,answer_one_index,answer_two_index,answer_three,answer_four from product_answers where report_id = ".$report->id." order by product_id asc";
            $productAnswers = DB::select( DB::raw($sql));

            if(!empty($productAnswers)) {
                foreach($productAnswers as $productAnswer) {
                    $answerPos = ($productPosition[$productAnswer->product_id] + 1);
                    $userProductAnswer[$answerPos] = $productAnswer;
                }

                foreach($productArray as $id => $product) {
                    if(!empty($userProductAnswer[$id])) {
                        echo "<td>";
                        print (isset($productAnswer->answer_one_index) && !empty($a1Ar[$productAnswer->answer_one_index])) ? $a1Ar[$productAnswer->answer_one_index] : '';
                        echo "</td>";
                        echo "<td>";
                        print (isset($productAnswer->answer_two_index) && !empty($a2Ar[$productAnswer->answer_two_index])) ? $a2Ar[$productAnswer->answer_two_index] : '';
                        echo "</td>";
                        echo "<td>";
                        print (isset($productAnswer->answer_three) && ctype_digit($productAnswer->answer_three)) ? '£'.$productAnswer->answer_three : '';
                        print "</td>";
                        echo "<td>";
                        print (isset($productAnswer->answer_four)) ? $productAnswer->answer_four : '';
                        print "</td>";
                    } else {
                        for($i = 1; $i <= 4; $i++) {
                            echo "<td>#</td>";
                        }
                    }
                }
            }
        ?></tr><?php
        }
    }
    ?>

</table>