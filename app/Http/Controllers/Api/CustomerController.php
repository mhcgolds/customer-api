<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        //
        return response()
            ->json([[
                'id' => 1,
                'name' => 'Customer 1',
                'email' => 'customer1@example.com',
            ]]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        //
        return response()
            ->json([
                'id' => 1,
                'status' => true,
                'errors' => [],
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        //
        return response()
            ->json([
                'id' => 1,
                'name' => 'Customer 1',
                'email' => 'customer1@example.com',
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        //
        return response()
            ->json([
                'id' => 1,
                'status' => true,
                'errors' => [],
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        //
        return response()
            ->json([
                'id' => 1,
                'status' => true,
                'errors' => [],
            ]);
    }
}
