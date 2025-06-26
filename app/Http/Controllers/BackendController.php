<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'success');
        $year   = $request->get('year', date('Y'));

        $totalOrders = Order::count();
        $totalUsers  = User::count();

        $totalProducts   = Product::count();
        $totalCategories = Category::count();

        // Pendapatan per bulan berdasarkan status dan tahun
        $monthlyRevenue = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as revenue')
            ->whereYear('created_at', $year)
            ->where('status', $status)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('revenue', 'month')
            ->toArray();

        $monthlyRevenueData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyRevenueData[] = $monthlyRevenue[$i] ?? 0;
        }

        // Penjualan produk per bulan (berdasarkan order success per tahun)
        $productSales = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $year)
            ->where('status', 'success')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $monthlyProductSales = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyProductSales[] = $productSales[$i] ?? 0;
        }

        $availableYears = Order::selectRaw('YEAR(created_at) as year')->distinct()->pluck('year');

        return view('backend.index', compact(
            'totalOrders',
            'totalUsers',
            'totalProducts',
            'totalCategories',
            'monthlyRevenueData',
            'monthlyProductSales',
            'status',
            'year',
            'availableYears'
        ));
    }
}
