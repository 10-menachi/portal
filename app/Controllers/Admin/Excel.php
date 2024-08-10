<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\DownloadResponse;
use CodeIgniter\I18n\Time;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Excel extends BaseController
{
    private $db;

    public function getIndex()
    {
        //
    }

    //    public function getDownload(): ?DownloadResponse
//    {
//        $path ="uploads/default-excel.xlsx";
//        $fileName=  "default-excel-".Time::now()->getTimestamp().".xlsx";
//        return $this->response->download($path, null)->setFileName($fileName);
//    }
    public function getDownload(): ?DownloadResponse
    {
        // Get the creation date and product name from the request
        $createdAt = $this->request->getGet('createdAt');
        $productName = $this->request->getGet('productName');
        log_message('info', 'Created date from the form: ' . $createdAt);
        log_message('info', 'Product Name from the form: ' . $productName);

        // Validate that the date is provided
        if (!$createdAt) {
            throw new \InvalidArgumentException("Created Date is required.");
        }

        // Load data from the tbl_product_sales table with the specified filters
        $salesData = $this->adminModel->getSalesDataByDateCreated($createdAt, $productName);

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'Product ID')
            ->setCellValue('B1', 'Product Name')
            ->setCellValue('C1', 'Product SKU')
            ->setCellValue('D1', 'Slug')
            ->setCellValue('E1', 'Description')
            ->setCellValue('F1', 'Sales Price')
            ->setCellValue('G1', 'Cost Price')
            ->setCellValue('H1', 'Warranty Start Date')
            ->setCellValue('I1', 'Warranty End Date')
            ->setCellValue('J1', 'QR Code');

        // Add data to the spreadsheet
        $row = 2; // Starting from the second row
        foreach ($salesData as $data) {
            $sheet->setCellValue('A' . $row, $data['product_id'])
                ->setCellValue('B' . $row, $data['name'])
                ->setCellValue('C' . $row, $data['sku'])
                ->setCellValue('D' . $row, $data['slug'])
                ->setCellValue('E' . $row, $data['description'])
                ->setCellValue('F' . $row, $data['salesPrice'])
                ->setCellValue('G' . $row, $data['costPrice'])
                ->setCellValue('H' . $row, $data['startDate'])
                ->setCellValue('I' . $row, $data['endDate'])
                ->setCellValue('J' . $row, $data['qr_code']);
            $row++;
        }

        // Generate the Excel file
        $writer = new Xlsx($spreadsheet);
        $filePath = WRITEPATH . 'uploads/' . "sales-data-" . Time::now()->getTimestamp() . ".xlsx";
        $writer->save($filePath);


        // Set a session variable to indicate the download was initiated
        session()->set('download_initiated', true);

        // Return the download response
        return $this->response->download($filePath, null)->setFileName(basename($filePath));
    }




    public function postUpload()
    {
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

        if (!$this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];
            // var_dump($data);
        } else {

            $file = $this->request->getFile('file');

            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $filepath = "uploads/" . $newName;
                $file->move('uploads', $newName);
                $data = ['uploaded_fileinfo' => new File($filepath)];
                $this->readExcel($filepath);
                //var_dump($data);
            } else {
                $data = ['errors' => 'The file has already been moved.'];
                //var_dump($data);
            }
        }


    }

    /**
     * @throws Exception
     */
    public function readExcel($filePath)
    {
        $inputFileName = $filePath;
        $inputFileType = IOFactory::identify($inputFileName);
        $reader = IOFactory::createReader($inputFileType);
        $spreadsheet = $reader->load($inputFileName);

        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, false);
        $i = 1;
        $excelDate = null;
        //var_dump($sheetData);
        unset($sheetData[0]);

        foreach ($sheetData as $item) {
            $product = $this->adminModel->wp_product_by_sku($item[1]);
            $excelDate[] = array(
                'qr_code' => $item[0],
                'sku' => $item[1],
                'startDate' => $item[2],
                'endDate' => $item[3],
                'description' => $item[4],
                'product_id' => ($product != null) ? $product['post_id'] : null,
            );
        }

        //  var_dump($excelDate);
    }

}