<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Files\ExcelFile;

class ExcelService extends ExcelFile {



	/**
	 * Get file
	 * @return string
	 */
	public function getFile()
	{
//		$importFileName =  time() . '-' . Input::file('import')->getClientOriginalName();
//		$importFilePath = storage_path('imports') . '/' . $importFileName;
//		dd($importFilePath);
//		dd(Input::file('import')->move(storage_path('imports'), $importFileName));

		$importFilePath = storage_path('imports/1442826750-price.xls');
//		dd(file_exists($importFilePath));
		chmod($importFilePath, 777);
		return $importFilePath;
	}
}