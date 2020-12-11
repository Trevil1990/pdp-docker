<?php

namespace app;

use Exception;
use Phar;
use PharData;

class HandlerTarGz implements InterfaceName
{
	public $filename;

	public function __construct($filename='index.html')
	{
		$this->filename = $filename;
	}

	public function Tararchive ()
	{
		try
		{
			$a = new PharData('phpinfo.tar');

			// ADD FILES TO archive.tar FILE
			$a->addFile($this->filename);

			// COMPRESS archive.tar FILE. COMPRESSED FILE WILL BE archive.tar.gz
			$a->compress(Phar::GZ);

			// NOTE THAT BOTH FILES WILL EXISTS. SO IF YOU WANT YOU CAN UNLINK archive.tar
			unlink('phpinfo.tar');
		}
		catch (Exception $e)
		{
			echo "Exception : " . $e;
		}
	}
}
