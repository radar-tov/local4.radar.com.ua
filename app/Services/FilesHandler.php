<?php

namespace App\Services;


use Illuminate\Support\Facades\File;
use Image;

/**
 * Class FilesHandler
 * @package App\Services
 */
class FilesHandler {


	/**
	 * @var String
	 */
	private $path;

	/**
	 * Setting path for file uploading
	 * @param null $path
	 */
	public function setFilePath($path = null)
	{
		$this->path = $path ? public_path($path) : public_path("images/");
	}

	/**
	 * @param $request
	 * @param null $path
	 * @return $request
	 */
	public function saveFile($request, $path = null)
	{

		if(!$request->files->all()) return $request;

		foreach($request->files->all() as $fileKey => $file) {


			$fileKey = key($request->files->all());
			$fileName = $this->getUniqueName($request->file($fileKey));

			$this->setFilePath($path);
			$this->prepareUploadDirectory();

			$ext = $request->file($fileKey)->getClientOriginalExtension();

			if($ext == "pdf" || $ext == "swf"){
				$request->file($fileKey)->move($ext .'/', $fileName);
				$request->merge([$fileKey => str_replace(public_path(), '', $ext .'/'. $fileName)]);
			}
			else {
				Image::make($request->file($fileKey)->getRealPath())->save($this->path . $fileName);
				$request->merge(["path" => str_replace(public_path(),'',$this->path . $fileName)]);
			}

			$request->files->remove($fileKey);
		}

		return $request;
	}


	/**
	 * @param $file
	 * @return string
	 */
	public function getUniqueName($file)
	{
		$fileName = str_random(10) . time(). '__'. $file->getClientOriginalName();
		return $fileName;
	}

	/**
	 * Just creating directory for file upload if not exists
	 * @return void
	 */
	public function prepareUploadDirectory()
	{
		if(! is_dir($this->path)) {
			mkdir($this->path);
		}
	}


	public function checkIfImage($file)
	{

	}

}