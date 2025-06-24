<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request, $id)
    {
        if (! Auth::check()) {
            // Jika belum login, redirect dengan alert
            toast('Silakan login terlebih dahulu untuk menambahkan ke keranjang.', 'error');
            return redirect('/login');
        }

        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($cart) {
            $cart->increment('qty', $request->qty);
        } else {
            Cart::create([
                'user_id'    => Auth::id(),
                'product_id' => $id,
                'qty'        => $request->qty,
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function updateCart(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);

        $request->validate([
            'qty' => 'required|integer|min:1|max:' . $cartItem->product->stock,
        ]);

        $cartItem->qty = $request->qty;
        $cartItem->save();

        toast('Jumlah berhasil diperbarui.', 'success');
        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cart->delete();
        toast('Produk berhasil dihapus dari keranjang.', 'success');
        return redirect()->route('cart.index');
    }

}
