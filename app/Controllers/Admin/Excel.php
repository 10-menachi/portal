<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\DownloadResponse;
use CodeIgniter\I18n\Time;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class Excel extends BaseController
{
    public function getIndex()
    {
        //
    }

    public function getDownload(): ?DownloadResponse
    {
        $path ="uploads/default-excel.xlsx";
        $fileName=  "default-excel-".Time::now()->getTimestamp().".xlsx";
        return $this->response->download($path, null)->setFileName($fileName);
    }

    public function postUpload(){
        $post = $this->request->getPost();

        $validationRule = [
            'file' => [
                'label' => 'Excel File',
                'rules' => [
                    'uploaded[file]',
                    'ext_in[file,xlsx]',
                ],
            ],
        ];

        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
           // var_dump($data);
        }else{

            $file = $this->request->getFile('file');

            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $filepath= "uploads/".$newName;
                $file->move(  'uploads', $newName);
                $data = ['uploaded_fileinfo' => new File($filepath)];
                $this->readExcel($filepath);
                //var_dump($data);
            }else{
                $data = ['errors' => 'The file has already been moved.'];
                //var_dump($data);
            }
        }


    }

    /**
     * @throws Exception
     */
    public function readExcel($filePath){
        $inputFileName = $filePath;
        $inputFileType = IOFactory::identify($inputFileName);
        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);

        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, false);
        $i=1;
        $excelDate=null;
        //var_dump($sheetData);
        unset($sheetData[0]);

        foreach ($sheetData as $item) {
            $product = $this->adminModel->wp_product_by_sku($item[1]);
            $excelDate[]=array(
                'qr_code'=> $item[0],
                'sku'=> $item[1],
                'startDate'=> $item[2],
                'endDate'=> $item[3],
                'description'=> $item[4],
                'product_id' => ($product != null ) ? $product['post_id'] : null,
            );
        }

      //  var_dump($excelDate);
    }

}
