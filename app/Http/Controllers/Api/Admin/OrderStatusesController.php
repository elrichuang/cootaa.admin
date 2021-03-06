<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Api\Controller;
use App\Http\Resources\OrderStatusResource;
use App\Models\OrderStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderStatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('refresh.token:admin');

        //$this->authorizeResource(User::class,'user');
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit');
        if ($limit)
        {
            $paginationData = OrderStatus::orderBy('id','desc')->paginate($limit);
            $items = OrderStatusResource::collection($paginationData);
            $paginationDataArray = $paginationData->toArray();
            $total = $paginationDataArray['total'];
        }else{
            $paginationData = OrderStatus::all();
            $items = OrderStatusResource::collection($paginationData);
            $total = $paginationData->count();
        }

        return responseSuccess('信息列表',[
            'items' => $items,
            'total' => $total
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param OrderStatus $orderStatus
     * @return JsonResponse
     */
    public function show(OrderStatus $orderStatus)
    {
        return responseSuccess('详细信息',new OrderStatusResource($orderStatus));
    }
}
