<?php

namespace app;

use Exception;
use Phar;
use PharData;

class HandlerTarGz implements InterfaceName
{

	public function tararchive ($filename)
	{
		try {
			$a = new PharData('info.tar');

			// ADD FILES TO archive.tar FILE
			$a->addFile($filename);

			// COMPRESS archive.tar FILE. COMPRESSED FILE WILL BE archive.tar.gz
			$a->compress(Phar::GZ);
		}
		catch (Exception $e) {
			echo "Exception : " . $e;
		}
	}
}
