<?php

namespace App\Services;

use App\Models\Backup;
use DB;
use Exception;

ini_set('memory_limit','512M');
set_time_limit(0);

/**
 * Created by Igor Mazur
 * Date: 23.09.15 23:05
 */
class BackupService
{
	/**
	 * Import backup path
	 */
	protected $path;
	/**
	 * Db host
	 */
	protected $host;
	/**
	 * Db name
	 */
	protected $database;
	/**
	 * Db username
	 */
	protected $username;
	/**
	 * Db password
	 */
	protected $password;

	/**
	 * System output message
	 * if success system return 0
	 */
	protected $output;

	public function __construct()
	{
		$this->path = storage_path('imports/backups');

		$this->boot();
	}

	protected function boot()
	{

		if(!is_dir(storage_path('imports'))){
			mkdir(storage_path('imports'));
		}
		if(!is_dir($this->path)) {
			mkdir($this->path);
		}

		$this->host = getenv('DB_HOST');
		$this->database = getenv('DB_DATABASE');
		$this->username = getenv('DB_USERNAME');
		$this->password = getenv('DB_PASSWORD');

		// $this->prepare();
		// $this->rollback();
	}

	public function prepare($allDb = false)
	{
		$output = null;
		$tables = '';

		if( ! $allDb) {
			$tables = 'categories brands images products ';
		}

		$backupFileName = date('d-m-Y_H-i-s') . '_import.sql.gz';
		$backupFilePath = "{$this->path}/{$backupFileName}";
		$system = "mysqldump -u{$this->username} -p{$this->password} {$this->database} {$tables} > {$backupFilePath}";

		system($system,$output);

		if(is_file($backupFilePath)) {
			$batch = collect(DB::select('select max(batch) as "batch" from imports'))->pop()->batch;
			$readyForCreate = ['import'=>$backupFilePath, 'batch'=>$batch+1];
			Backup::create($readyForCreate);
		}
	}

	public function rollback()
	{
		$output = null;
		$backup = Backup::whereRaw('id = (select max(`id`) from imports)')->first();

		if($backup && file_exists($backup->import)) {
			$system = "{$backup->import} | mysql -u{$this->username} -p{$this->password} {$this->database}";
			DB::statement('SET foreign_key_checks = 0;');
			system($system,$output);
			DB::statement('SET foreign_key_checks = 1;');

			if($output == 0) {
				// success
				@unlink($backup->import);
				$backup->delete();

				return true;
			}
		}

		return false;
	}
}