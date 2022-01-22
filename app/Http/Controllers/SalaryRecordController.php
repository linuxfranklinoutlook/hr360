<?php

namespace App\Http\Controllers;

use App\Models\SalaryDeduction;
use App\Models\SalaryRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
		$salary_records = SalaryRecord::groupBy('year')->orderBy('year', 'ASC')->pluck('year');
		$year_records = collect();
		$month_records = collect();

		// if(request('year')) {
		// 	$year_records = SalaryRecord::where('year', request('year'))->get()->groupBy('month');
		// }

		if(request('month')) {
			$month_records = SalaryRecord::where('year', request('year'))->where('month', request('month'))->get();
		}

		return view('admin.payroll.index', compact('salary_records', 'month_records'));
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
		$salary_record = DB::transaction(function() use($request) {
			$salary_record = SalaryRecord::create($request->all());
			
			foreach ($request->deductions as $d) {
				# code...
				SalaryDeduction::create(['salary_record_id' => $salary_record->id, 'reason' => $d['reason'], 'deduction_amount' => $d['amount']]);
			}

			$deductions = $salary_record->deductions->sum(function($s) {
				return (int) $s->deduction_amount;
			});

			$salary_record->net_in_hand = (int) $salary_record->gross_in_hand - $deductions;
			$salary_record->update();

			return $salary_record;
		});

		// dd($salary_record);
		
		toast('Pay Slip created.','success','top-right');

		return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalaryRecord  $salaryRecord
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryRecord $salaryRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalaryRecord  $salaryRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(SalaryRecord $salaryRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalaryRecord  $salaryRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaryRecord $salaryRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalaryRecord  $salaryRecord
     * @return \Illuminate\Http\Response
     */
    public function delete(SalaryRecord $salaryRecord)
    {
        //
		$salaryRecord->delete();

		return redirect()->route('payslip.index');
    }
}
