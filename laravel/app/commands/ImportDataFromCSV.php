<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ImportDataFromCSV extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'import:fromCSV';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from the product CSV';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $row = 1;

        // define the column list
        $colAr["ItemNo"] = 0;
        $colAr["Title"] = 1;
//        $colAr["Dims"] = 2;
//        $colAr["Supplier"] = 3;
//        $colAr["WsalePrice"] = 4;
//        $colAr["CarriageFee"] = 5;
//        $colAr["Cat"] = 6;
//        $colAr["WaiverMinOrder"] = 7;
//        $colAr["RRP"] = 8;
        $colAr["Description"] = 2;
        $colAr["ProductGroup"] = 3;

        // ignored titles
        $ignoredTitleAr["WRAP"] = 1;
        $ignoredTitleAr["CARDS"] = 1;
        $ignoredTitleAr["NEW BABY GIFTS"] = 1;
        $ignoredTitleAr["WEDDING"] = 1;
        $ignoredTitleAr["MISC."] = 1;
        $ignoredTitleAr["CANDLES"] = 1;
        $ignoredTitleAr["HANDWASH"] = 1;
        $ignoredTitleAr["PURSE"] = 1;
        $ignoredTitleAr["CUSHIONS"] = 1;
        $ignoredTitleAr["TEA TOWELS"] = 1;
        $ignoredTitleAr["MUG"] = 1;
        $ignoredTitleAr["NOTEBOOKS"] = 1;
        $ignoredTitleAr["BOOKS"] = 1;
        $ignoredTitleAr["NOTECARD / WRITING SETS"] = 1;
        $ignoredTitleAr["TOTES"] = 1;
        $ignoredTitleAr["PRINTS"] = 1;

        // set the path to the CSV
        $csvFile = new Keboola\Csv\CsvFile(storage_path(). '/csv/Product_Chooser_Inventory_ON SITE_12.04.csv');

        // truncate groups and products
        DB::select(DB::raw('TRUNCATE groups'));
        DB::select(DB::raw('TRUNCATE products'));

        $counter = 0;

        // create group 1
        Group::create(array('display_count' => 0,
                            'name' => 'Group One',
                            'description' => 'Group One'));


        // create group 1
        Group::create(array('display_count' => 0,
                            'name' => 'Group Two',
                            'description' => 'Group Two'));

        // create group 1
        Group::create(array('display_count' => 0,
                            'name' => 'Group Three',
                            'description' => 'Group Three'));

        // create group 1
        Group::create(array('display_count' => 0,
                            'name' => 'Group Four',
                            'description' => 'Group Four'));

        // process each row
        foreach($csvFile as $row) {

            // ignore the first row
            if ($counter > 0) {

                // we only want numbered rows
                if ($row[$colAr["ItemNo"]] != "") {
                    if(count($row) > 4) {
                        print_r($row);
                        die;
                    }
                    // define the column list
                    $itemNo = addslashes($row[$colAr["ItemNo"]]);
                    $title = addslashes($row[$colAr["Title"]]);
//                    $dims = utf8_encode(addslashes($row[$colAr["Dims"]]));
//                    $supplier = utf8_encode(addslashes($row[$colAr["Supplier"]]));
//                    $wsalePrice = utf8_encode(addslashes($row[$colAr["WsalePrice"]]));
//                    $carriageFee = utf8_encode(addslashes($row[$colAr["CarriageFee"]]));
//                    $category = utf8_encode(addslashes($row[$colAr["Cat"]]));
//                    $waiverMinOrder = utf8_encode(addslashes($row[$colAr["WaiverMinOrder"]]));
//                    $rrp = utf8_encode(addslashes($row[$colAr["RRP"]]));
                    if(!empty($row[$colAr["Description"]])) {
                        $description = addslashes($row[$colAr["Description"]]);
                    } else {
                        $description = "";
                    }

                    // do we need to ignore this row?
                    if (!empty($ignoredTitleAr[$title]) AND
                        $ignoredTitleAr[$title] == 1) {
                        continue;
                    }

                    if(!empty($row[$colAr["ProductGroup"]])) {
                        $productGroup = addslashes($row[$colAr["ProductGroup"]]);
                    } else {
                        $productGroup = "";
                    }

                    $picture_1_url = '/images/product_chooser/'.$itemNo.'.jpg';

                    echo "\n ---------------------------";
                    echo "\n Item Number : ".$itemNo;
                    echo "\n Title :: ".$title;
                    echo "\n Description :: ".$description;
                    echo "\n Picture URL :: ".$picture_1_url;
                    echo "\n Product Group :: ".$productGroup;

                    $hash = md5(time()."dsfgbse5ysgdrthe65rt");


                    $p = new Product;
                    $p->id              = $itemNo;
                    $p->display_count   = 0;
                    $p->title           = $title;
                    $p->description     = $description;
                    $p->hash            = $hash;
                    $p->picture_url_1   = $picture_1_url;
                    $p->group_id        = $productGroup;
                    $p->save();

                }
            }

            $counter++;
        }
        //$this->info('Display this on the screen');
        //$this->error('Something went wrong!');

//        }

        //$this->info('Display this on the screen');
        //$this->error('Something went wrong!');
    }

//    /**
//     * Get the console command arguments.
//     *
//     * @return array
//     */
//    protected function getArguments()
//    {
//        return array(
//            array('example', InputArgument::REQUIRED, 'An example argument.'),
//        );
//    }
//
    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('example', null, InputOption::VALUE_OPTIONAL,
                  'An example option.', null),
        );
    }
}