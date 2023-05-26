<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = DB::table('drinks')->where('user_id', Auth::user()->id)->get();

        return view('report/report', [
            'drinks' => $drinks,
        ]);
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

    public function download()
    {
        $drinks = DB::table('drinks')->where('user_id', Auth::user()->id)->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle("Relatório Rule Shots");

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nome');
        $sheet->setCellValue('C1', 'Peso Garrafa Vazia');
        $sheet->setCellValue('D1', 'Peso Shot');
        $sheet->setCellValue('E1', 'Shots Restantes');

        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);

        $row = 2;
        foreach ($drinks as $drink) {
            $sheet->setCellValue('A' . $row, $drink->id);
            $sheet->setCellValue('B' . $row, $drink->name);
            $sheet->setCellValue('C' . $row, $drink->empty_bottle_weight);
            $sheet->setCellValue('D' . $row, $drink->shot_weight);
            $sheet->setCellValue('E' . $row, $drink->shot_remaining);

            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('Relatorio_Rule_Shots');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Relatorio_Rule_Shots"' . date("d/m/Y") . '".xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
