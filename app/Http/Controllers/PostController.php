<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\PostService;
use Exception;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $result = ['status' => 200];

        $data = $request->only([
            'title',
            'description'
        ]);

        try {
            $result['data'] = $this->postService->savePostData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $result = ['status' => 200];

        $data = $request->only([
            'title',
            'description'
        ]);

        try {
            $result['data'] = $this->postService->updatePostData($data, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->delete($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
