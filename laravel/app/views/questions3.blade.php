@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-lg-4">
        <h4>Survey Progress</h4>
    </div>
    <div class="col-lg-8">
        <div class="progress progress-striped">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                <span class="sr-only">45% Complete</span>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        // question 8 why show/hide
        $('input:radio[name=q8]').change(function(){
            // hide / show why box
            if($('input:radio[name=q8]:checked').val() == 'Never') {
                $("#display_q8_why").show();
            } else {
                $("#display_q8_why").hide();
            }
        });
        // question 9 why show/hide
        $('input:radio[name=q9]').change(function(){
            // hide / show why box
            if($('input:radio[name=q9]:checked').val() == 'Never') {
                $("#display_q9_why").show();
            } else {
                $("#display_q9_why").hide();
            }
        });
    })
</script>
<div class="row">

    {{ Form::open(array('url' => '/survey')) }}

    <input type="hidden" name="s" value="1"/>

    <div class="col-lg-12">

        <!-- Question Seven -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q7'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[7];?><?php echo (!empty($validationErrorAr['q7']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q7'] . "</span>" : ""; ?></h4>
                    <?php
                    // question seven
                    foreach ($q7Ar as $id => $qval) {
                        ?>
                        <label class="radio-inline">
                            <input type="radio" name="q7" id="q7"
                                   <?php echo ($q7 == $qval) ? "checked=checked" : ""; ?>
                                   value="<?php echo $qval; ?>">
                            <?php echo $qval; ?>
                        </label>
                    <?php
                    }
                    ?>
            </div>
        </div>

        <!-- Question Eight -->
        <div class="form-group <?php echo (!empty($validationErrorAr['q8'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[8];?><?php echo (!empty($validationErrorAr['q8']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q8'] . "</span>" : ""; ?></h4>
                    <?php
                    $q8why = "";
                    if(!empty($_POST['q8_why']) && !empty($_POST['q8'])) {
                        $q8 = $_POST['q8'];
                        $q8why = $_POST['q8_why'];
                    }

                    // question eight
                    foreach ($q8Ar as $id => $qval) {
                        ?>
                        <label class="radio-inline">
                            <input type="radio" name="q8" class="q8" id="q8_<?php echo $id; ?>"
                                   <?php echo ($q8 == $qval) ? "checked=checked" : ""; ?>
                                   value="<?php echo $qval; ?>">
                            <?php echo $qval; ?>
                        </label>
                    <?php
                    }
                    ?>
                    <label class="radio-inline" id="display_q8_why" <?php if($q8why!="Never") { ?>style="display:none"<?php } ?>>
                        Please state why?
                        <textarea name="q8_why" class="form-control" rows="2"><?php echo $q8why; ?></textarea>
                    </label>
            </div>
        </div>

        <!-- Question Nine-->
        <div class="form-group <?php echo (!empty($validationErrorAr['q9'])) ? "has-error has-feedback" : ""; ?>">
            <div class="well">
                <h4><?php echo $questionsAr[9];?><?php echo (!empty($validationErrorAr['q9']))
                        ? " <span class='invalid'>"
                        . $validationErrorAr['q9'] . "</span>" : ""; ?></h4>
                <?php
                $q9why = "";
                if(!empty($_POST['q9_why']) && !empty($_POST['q9'])) {
                    $q9 = $_POST['q9'];
                    $q9why = $_POST['q9_why'];
                }

                // question nine
                foreach ($q9Ar as $id => $qval) {
                    ?>
                    <label class="radio-inline">
                        <input type="radio" name="q9" id="q9_<?php echo $id; ?>"
                               <?php echo ($q9 == $qval) ? "checked=checked" : ""; ?>
                               value="<?php echo $qval; ?>">
                        <?php echo $qval; ?>
                    </label>
                <?php
                }
                ?>
                <label class="radio-inline" id="display_q9_why" <?php if($q9why!="Never") { ?>style="display:none"<?php } ?>>
                    Please state why?
                    <textarea name="q9_why" class="form-control" rows="2"><?php echo $q9why; ?></textarea>
                </label>
            </div>
        </div>

        <div class="col-lg-12">
            <button type="submit" class="btn btn-success pull-right">Next
            </button>
        </div>
        {{ Form::close() }}
    </div>
    @stop
</div>