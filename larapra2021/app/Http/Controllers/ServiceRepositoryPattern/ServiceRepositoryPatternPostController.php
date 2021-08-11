<?php

namespace App\Http\Controllers\ServiceRepositoryPattern;

use App\Models\serviceRepositoryPattern\ServiceRepositoryPatternPost;
use App\Services\ServiceRepositoryPattern\ServiceRepositoryPatternPostService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceRepositoryPatternPostController extends Controller
{

    public function __construct(
        ServiceRepositoryPatternPostService  $postService
    ){
        $this->postService = $postService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return $result;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = ['status' => 200];

        
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'title',
            'description'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->savePostData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceRepositoryPattern  $serviceRepositoryPattern
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceRepositoryPatternPost $post)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->getById($post->id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return $result;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceRepositoryPattern  $serviceRepositoryPattern
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceRepositoryPatternPost $post)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->getById($post->id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        
        return $result;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceRepositoryPattern  $serviceRepositoryPattern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceRepositoryPatternPost $post)
    {
        $id = $post['id'];
        $data = $request->only([
            'title',
            'description'
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->updatePostData($data, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return $result;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceRepositoryPattern  $serviceRepositoryPattern
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceRepositoryPatternPost $post)
    {
        $id = $post['id'];
        $result = ['status' => 200];

        try {
            $result['data'] = $this->postService->deleteByID($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return $result;
    }
}
