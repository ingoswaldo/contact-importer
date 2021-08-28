<?php

namespace App\Http\Controllers;

use App\Models\UploadFile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('upload-files.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  UploadFile  $uploadFiles
     * @return Response
     */
    public function show(UploadFile $uploadFiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  UploadFile  $uploadFiles
     * @return Response
     */
    public function edit(UploadFile $uploadFiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request     $request
     * @param  UploadFile  $uploadFiles
     * @return Response
     */
    public function update(Request $request, UploadFile $uploadFiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  UploadFile  $uploadFiles
     * @return Response
     */
    public function destroy(UploadFile $uploadFiles)
    {
        //
    }
}
