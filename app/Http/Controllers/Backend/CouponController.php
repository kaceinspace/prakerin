<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // Tampilkan semua kupon
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('backend.coupons.index', compact('coupons'));
    }

    // Form tambah kupon
    public function create()
    {
        return view('backend.coupons.create');
    }

    // Simpan kupon
    public function store(Request $request)
    {
        $request->validate([
            'code'       => 'required|unique:coupons,code',
            'type'       => 'required|in:fixed,percent',
            'value'      => 'required',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $cleanValue = (int) preg_replace('/[^\d]/', '', $request->value);

        Coupon::create([
            'code'       => $request->code,
            'type'       => $request->type,
            'value'      => $cleanValue,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'is_active'  => true,
        ]);

        toast('Kupon berhasil ditambahkan', 'success');
        return redirect()->route('backend.coupons.index');
    }

    // Form edit
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupons.edit', compact('coupon'));
    }

    // Update kupon
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'code'       => 'required|unique:coupons,code,' . $coupon->id,
            'type'       => 'required|in:fixed,percent',
            'value'      => 'required',
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $value = preg_replace('/[^\d]/', '', $request->value);

        $coupon->update([
            'code'       => $request->code,
            'type'       => $request->type,
            'value'      => (int) $value,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
            'is_active'  => $request->has('is_active'),
        ]);

        toast('Kupon berhasil diperbarui', 'success');
        return redirect()->route('backend.coupons.index');
    }

    // Hapus kupon
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        toast('Kupon berhasil dihapus', 'success');
        return back();
    }
}
