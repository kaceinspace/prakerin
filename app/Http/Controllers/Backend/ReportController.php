<?php
namespace App\Http\Controllers\Backend;

use App\Exports\OrderExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $year       = $request->get('year', date('Y'));
        $status     = $request->get('status', 'all');
        $start_date = $request->get('start_date');
        $end_date   = $request->get('end_date');

        $query = Order::with('user')->whereYear('created_at', $year);

        if ($status !== 'all') {
            $query->where('status', $status);
        }

        if ($start_date) {
            $query->whereDate('created_at', '>=', $start_date);
        }

        if ($end_date) {
            $query->whereDate('created_at', '<=', $end_date);
        }

        $orders = $query->orderBy('created_at', 'desc')->get();

        $availableYears = Order::selectRaw('YEAR(created_at) as year')->distinct()->pluck('year');

        return view('backend.report.index', compact('orders', 'availableYears', 'year', 'status'));
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new OrderExport($request), 'orders_report.xlsx');
    }

    public function exportPDF(Request $request)
    {
        $query = Order::with('user')->whereYear('created_at', $request->get('year', date('Y')));

        if ($request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $orders = $query->get();

        $pdf = PDF::loadView('backend.report.export_pdf', compact('orders'))->setPaper('A4', 'landscape');

        return $pdf->download('orders_report.pdf');
    }

}
