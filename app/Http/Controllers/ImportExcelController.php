<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportExcelController extends Controller
{

    function index()
    {
        $user = User::orderBy('id', 'DESC')->paginate(10);
        return view('fontend.user.import_excel', ['data' => $user]);
    }

    function importData(Request $request)
    {
        $this->validate($request, [
            'uploaded_file' => 'required|file|mimes:xls,xlsx'
        ], [
            'uploaded_file.required' => 'Không được để trống!',
            'uploaded_file.mimes' => 'Vui lòng chọn file .xls hoặc .xlsx!',
        ]);
        $the_file = $request->file('uploaded_file');
        try {
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range(2, $row_limit);
            $column_range = range('F', $column_limit);
            $startcount = 2;
            $data = array();
            foreach ($row_range as $row) {
                $data[] = [
                    'name' => $sheet->getCell('A' . $row)->getValue(),
                    'email' => $sheet->getCell('B' . $row)->getValue(),
                    'password' => Hash::make($sheet->getCell('C' . $row)->getValue()),
                ];
                $startcount++;
            }
            User::insert($data);
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('Đã xảy ra sự cố khi tải lên!');
        }
        return back()->withSuccess('Great! Successfully uploaded.');
    }



    public function ExportExcel($user_data)
    {
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', '4000M');
        try {
            $spreadSheet = new Spreadsheet();
            $spreadSheet->getActiveSheet()->getDefaultColumnDimension()->setWidth(20);
            $spreadSheet->getActiveSheet()->fromArray($user_data);
            $Excel_writer = new Xls($spreadSheet);
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="User_ExportedData.xls"');
            header('Cache-Control: max-age=0');
            ob_end_clean();
            $Excel_writer->save('php://output');
            exit();
        } catch (Exception $e) {
            return;
        }
    }

    function exportData()
    {
        $data = User::orderBy('id', 'DESC')->get();
        $data_array[] = array("Name", "Email", "Password");
        foreach ($data as $data_item) {
            $data_array[] = array(
                'Name' => $data_item->name,
                'Email' => $data_item->email,
                'Password' => $data_item->password,
            );
        }
        $this->ExportExcel($data_array);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('message', 'Xóa thành công!');;
    }
}
