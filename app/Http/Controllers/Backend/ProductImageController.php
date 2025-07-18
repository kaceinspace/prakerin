<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;

class ProductImageController extends Controller
{

    public function store(Request $request, $productId)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file     = $request->file('file');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path     = $file->storeAs('products/gallery', $filename, 'public');

        ProductImage::create([
            'product_id' => $productId,
            'image'      => $path,
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $image = ProductImage::findOrFail($id);
        Storage::disk('public')->delete($image->image);
        $image->delete();
        toast('Data berhasil dihapus', 'success');
        return back();
    }
}
