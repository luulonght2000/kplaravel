<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \PhpOffice\PhpSpreadsheet\IOFactory;

class UserController extends Controller
{
    public function import(Request $request)
    {
        $uploadFile = $request->file(key: 'file');
        $filename = time() . $uploadFile->getClientOriginalName();

        //saveFile
        $path = Storage::disk(name: 'local')->putFileAs(path: 'files', $uploadFile, $filename);
        $filePath = Storage::path($path);

        $usersData = $this->readData($filePath);
    }
    private function readData($filePath)
    {
        $spreadsheet = IOFactory::load($filePath);

        $workSheet = $spreadsheet->ghetSheet(sheetIndex: 0);
        $highestColumn = $workSheet->getHighestColumn();
        $highestRow = $workSheet->getHighestRow();

        $data = $workSheet->rangeToArray(range: "A2:{$highestColumn}{$highestRow}");

        return array_map(function ($item) {
            return array_combine(['name', 'email', 'password'], $item);
        }, $data);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
