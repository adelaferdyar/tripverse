
<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Tiket;

Route::get('/', fn () => redirect()->route('tiket.index'));

Route::get('/tiket', function (Request $request) {
    $query = Tiket::query();

    // SEARCHING berdasarkan kota asal
    if ($request->filled('asal')) {
        $query->where('asal', 'like', '%' . $request->asal . '%');
    }

    // SEARCHING berdasarkan kota tujuan
    if ($request->filled('tujuan')) {
        $query->where('tujuan', 'like', '%' . $request->tujuan . '%');
    }

    // FILTER berdasarkan jenis transportasi
    if ($request->filled('jenis')) {
        $query->where('jenis', $request->jenis);
    }

    // SORTING berdasarkan pilihan pengguna
    switch ($request->sort) {
        case 'termurah':
            $query->orderBy('harga', 'asc');
            break;

        case 'termahal':
            $query->orderBy('harga', 'desc');
            break;

        case 'durasi':
            $query->orderBy('durasi', 'asc');
            break;

        default:
            $query->orderBy('id', 'asc');
            break;
    }

    $tiket = $query->get();

    return view('tiket.index', [
        'tiket' => $tiket,
        'tanggal' => $request->tanggal,
    ]);
})->name('tiket.index');