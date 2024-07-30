<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use Hashids\Hashids;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends BaseController
{

//    private  $hashIds;
//
//    public function __construct()
//    {
//        $this->hashIds = new Hashids('OjCNz34S20t6fkx7iVp4dXhDCDFXyf6K',20,'abcdefghijklmnopqrstuvwxyz123456789');
//    }

    public function index()
    {
        return view('welcome_message');
    }

    public function excel(){
        $wp_url="https://yourapps.co.ke/product-sales/";

        $mySpreadsheet = new Spreadsheet();
        // delete the default active sheet
        $mySpreadsheet->removeSheetByIndex(0);
        $worksheet1 = new Worksheet($mySpreadsheet, "Sheet 1");
        $mySpreadsheet->addSheet($worksheet1, 0);

        $sheet1Data = []; //[ ["Sr No.","QRCode", "Link"] ];

        for ($x = 10001; $x <= 20000; $x++) {
            $hasId = $this->hashIds->encode($x);
//            $sheet1Data[]=[
//                $x,$hasId,$wp_url.$hasId
//            ];
            $sheet1Data[]=[
                'hashId'=> $x,
                'code'=> $hasId ,
                'link'=> $wp_url.$hasId,
            ];
        }

        var_dump($sheet1Data);

      //  $this->adminModel->batchInsertData('tbl_qrcode',$sheet1Data);

//       foreach ($data as $item){
//            $sheet1Data[]= array(
//                Time::parse($item['created'])->format('y-m-d'), $item['heading'],
//            );
//        }

//        $worksheet1->fromArray($sheet1Data);
//
//        $worksheets = [$worksheet1];
//
//        foreach ($worksheets as $worksheet)
//        {
//            foreach ($worksheet->getColumnIterator() as $column)
//            {
//                $worksheet->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
//            }
//        }
//
//        $now = Time::now()->getTimestamp();
//        $fileName = "demo_".$now.".xlsx";
//        // Save to file.
//        $writer = new Xlsx($mySpreadsheet);
//        $writer->save('uploads/'.$fileName);
//
//        var_dump($fileName);

    }
}
