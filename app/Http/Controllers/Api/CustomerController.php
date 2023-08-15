<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\CustomerRepository;

class CustomerController extends Controller
{
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function list(): JsonResponse
    {
        $data = $this->customerRepository->list();

        return response()
            ->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $result = $this->customerRepository->store($request->all());

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
        $result = $this->customerRepository->show($id);

        return response()
            ->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $result = $this->customerRepository->update($id, $request->all());

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
        $result = $this->customerRepository->destroy($id);

        return response()
            ->json([
                'id' => $id,
                'status' => ($result === true), // $result can be true, false or null
                'errors' => [],
            ]);
    }
}
