<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;


class UserApi extends BaseController
{

public function index()
{

$model = new UserModel();

$data = $model->findAll();

return $this->response->setJSON($data);

}

}