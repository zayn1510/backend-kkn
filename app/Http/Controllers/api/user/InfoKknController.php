<?php

namespace App\Http\Controllers\api\user;

use App\Http\Controllers\Controller;
use App\Repository\User\InfoKknRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InfoKknController extends Controller
{
    protected InfoKknRepo $repo;

    public function __construct(InfoKknRepo $infoKknRepo)
    {
        $this->repo=$infoKknRepo;
    }

    public function get_data($id) : JsonResponse
    {
        return $this->repo->getInfoKkn($id);
    }

    public function check_data_periode(): JsonResponse
    {
        return $this->repo->checkPeriodeKkn();
    }
}
