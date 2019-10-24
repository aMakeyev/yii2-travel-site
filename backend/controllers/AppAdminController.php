<?php

namespace backend\controllers;

use yii\web\Controller;

class AppAdminController extends Controller{

	public function actions()
	{
		return [
			'file-upload' => [
				'class' => 'vova07\imperavi\actions\UploadFileAction',
				'url' => 'http://my-site.com/files/', // Directory URL address, where files are stored.
				'path' => '../../frontend/web/upload/global/', // Or absolute path to directory where files are stored.
				'uploadOnlyImage' => false, // For any kind of files uploading.
			],
		];
	}

	protected function setMeta($title = null, $keywords = null, $description = null){
		$this->view->title = $title;
	}

}