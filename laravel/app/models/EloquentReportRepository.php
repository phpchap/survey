<?php

class EloquentReportRepository {

    public function all(){
        return Report::all();
    }

    public function find($id) {
        return Report::find($id);
    }

    public function fetchReport($session, $productId){
        $report = Report::whereRaw("session = '".$session."' & product_id = '".$productId."'")->first();
        return (is_object($report)) ? $report: new Report();
    }
}
