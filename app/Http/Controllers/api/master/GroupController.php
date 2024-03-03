<?php

/**
 * Summary of namespace App\Http\Controllers\api\master
 */
namespace App\Http\Controllers\api\master;

use App\Http\Controllers\Controller;
use App\Http\Requests\master\GroupKknRequest;
use App\Repository\Master\GroupRepo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Summary of GroupController
 */
class GroupController extends Controller
{
    /**
     * Summary of grouprepo
     * @var GroupRepo
     */
    protected GroupRepo $grouprepo;

    /**
     * Summary of __construct
     * @param \App\Repository\Master\GroupRepo $groupRepo
     */
    public function __construct(GroupRepo $groupRepo)
    {
        $this->grouprepo=$groupRepo;
    }

    /**
     * Summary of save_data
     * @param \App\Http\Requests\master\GroupKknRequest $groupKknRequest
     * @return \Illuminate\Http\JsonResponse
     */
    public function save_data(GroupKknRequest $groupKknRequest) : JsonResponse
    {
        return $this->grouprepo->saveData($groupKknRequest);
    }

    /**
     * Summary of get_data
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_data() : JsonResponse
    {
        return $this->grouprepo->getData();
    }

    /**
     * Summary of delete_data
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_data($id) : JsonResponse
    {
        return $this->grouprepo->deleteData($id);
    }

    /**
     * Summary of detail_data
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail_data($id) : JsonResponse
    {
        return $this->grouprepo->detailData($id);
    }

    public function get_data_user_group($id) : JsonResponse
    {
        return $this->grouprepo->getDataUserGroup($id);
    }
}
