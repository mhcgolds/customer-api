<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\CustomerContactsRepository;

class CustomerContactsController extends Controller
{
    private CustomerContactsRepository $customerContactsRepository;

    public function __construct(CustomerContactsRepository $customerContactsRepository)
    {
        $this->customerContactsRepository = $customerContactsRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function list(int $id): JsonResponse
    {
        $data = $this->customerContactsRepository->list(['customer_id' => $id]);

        return response()
            ->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $result = $this->customerContactsRepository->store($request->all());

        return response()
            ->json([
                'id' => $result,
                'status' => ($result !== 0),
                'errors' => [],
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $result = $this->customerContactsRepository->show($id);

        return response()
            ->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $result = $this->customerContactsRepository->update($id, $request->all());

        return response()
            ->json([
                'id' => $id,
                'status' => $result,
                'errors' => [],
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $result = $this->customerContactsRepository->destroy($id);

        return response()
            ->json([
                'id' => $id,
                'status' => ($result === true), // $result can be true, false or null
                'errors' => [],
            ]);
    }
}
