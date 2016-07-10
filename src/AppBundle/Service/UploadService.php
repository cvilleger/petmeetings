<?php
namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
class UploadService{
	protected $uploadFileRoot;
	/**
	 * @param $rootDir
	 */
	public function __construct($rootDir){
		$this->uploadFileRoot = realpath($rootDir . '/../web/uploads');
	}

	/**
	 * Upload a file
	 * @param $file
	 * @return string
	 * @throws \Exception
	 */
	public function uploadFile(UploadedFile $file){
		if($this->checkExtension($file)){
			$uniqueNameFile = $this->setUniqueFileName($file);
			$file->move($this->uploadFileRoot, $uniqueNameFile);
			return $uniqueNameFile;
		}
		throw new \Exception('Erreur lors de l\'upload : extension non autorisée.');
	}
	/**
	 * Set an unique name to uploaded files
	 * @param $file
	 * @return string
	 */
	public function setUniqueFileName(UploadedFile $file){
		$extension = $file->guessExtension();
		$name = microtime() . '.' . $extension;
		$name = str_replace(' ', '', $name);
		return $name;
	}
	/**
	 * Check if extension is valid
	 * @param UploadedFile $file
	 * @return bool
	 */
	protected function checkExtension(UploadedFile $file){
		$extension = $file->guessExtension();
		$extensions = array('jpg', 'jpeg', 'png');
		if(in_array($extension, $extensions)){
			return true;
		}
		return false;
	}
}