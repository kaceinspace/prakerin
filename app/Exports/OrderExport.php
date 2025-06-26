<?php
namespace App\Exports;

use App\Models\Order;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrderExport implements FromView
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $query = Order::with('user')->whereYear('created_at', $this->request->get('year', date('Y')));

        if ($this->request->get('status') && $this->request->get('status') !== 'all') {
            $query->where('status', $this->request->get('status'));
        }

        if ($this->request->start_date) {
            $query->whereDate('created_at', '>=', $this->request->start_date);
        }

        if ($this->request->end_date) {
            $query->whereDate('created_at', '<=', $this->request->end_date);
        }

        return view('backend.report.export_excel', [
            'orders' => $query->get(),
        ]);
    }
}
