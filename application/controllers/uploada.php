<?php
/*
上传
*/
class Upload{
	public function uploadfile()
	{
		$error = "";
		$msg = "";
		$fileElementName = 'uploadtofile';
		$targetPath = 'uploads/';
		$uploadPath ='uploads/';
		$filetmpname = "";
		$typesArray = array('jpg','gif','png','doc','docx','rar');
		if(!empty($_FILES[$fileElementName]['error']))
		{
			switch($_FILES[$fileElementName]['error'])
			{
		
				case '1':
					$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
					break;
				case '2':
					$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
					break;
				case '3':
					$error = 'The uploaded file was only partially uploaded';
					break;
				case '4':
					$error = 'No file was uploaded.';
					break;
		
				case '6':
					$error = 'Missing a temporary folder';
					break;
				case '7':
					$error = 'Failed to write file to disk';
					break;
				case '8':
					$error = 'File upload stopped by extension';
					break;
				case '999':
				default:
					$error = 'No error code avaiable';
			}
		}elseif(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
		{
			$error = 'No file was uploaded..';
		}else
		{
			$fileParts  = pathinfo($_FILES[$fileElementName]['name']);
			$filetmp    = date("YmdHis").mt_rand(10000,99999);
			$fileParts['extension'] = strtolower($fileParts['extension']);//后缀名替换为小写
			$filetmpname = str_replace('//','/',$uploadPath) . $filetmp . '.'. $fileParts['extension'];
			$dir = str_replace('//','/',$targetPath);
			$targetfile = $dir . $filetmp . '.'. $fileParts['extension'];
			$tempFile = $_FILES[$fileElementName]['tmp_name'];
			
			if (!is_dir($dir)) {
				mkdir($dir);
			}
				
			if (in_array($fileParts['extension'],$typesArray)) {
				move_uploaded_file($tempFile,$targetfile);
				$msg .= '上传成功';
			} else {
				$error ='Invalid file type.';
			}
			//for security reason, we force to remove all uploaded file
			@unlink($_FILES[$fileElementName]);
			//file_put_contents('11.txt',$filetmpname);	20120224
		}
		echo "{";
		echo				"error: '" . $error . "',\n";
		echo				"msg: '" . $msg . "',\n";
		echo				"file: '" . $filetmpname . "'\n";
		echo "}";
	}
}

?>