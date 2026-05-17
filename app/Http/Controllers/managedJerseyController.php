<?php

namespace App\Http\Controllers;

use App\Models\DatJersey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class managedJerseyController extends Controller
{
    //
    protected $atributes = [];
    public function store(Request $request)
    {


        DB::beginTransaction();

        try {
            $request->validate([
                'events_id'    => 'required|integer',
                'isHome'       => 'required|boolean',
                'path_jersey'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imagePath = $request->file('path_jersey')->store('jersey', 'public');

            DatJersey::create([
                'events_id'   => $request->events_id,
                'isHome'      => $request->isHome,
                'path_jersey' => $imagePath,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Jersey berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();

            if (isset($imagePath) && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            dd($e->getMessage());
            return redirect()->back()
                ->withErrors(['errors' => 'Gagal menambahkan jersey: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $jersey = DatJersey::findOrFail($id);

        return view('pages.user.jersey.edit', compact('jersey'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'events_id'    => 'required|integer',
            'isHome'       => 'required|boolean',
            'path_jersey'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $jersey = DatJersey::findOrFail($id);

            if ($request->hasFile('path_jersey')) {
                if ($jersey->path_jersey && Storage::disk('public')->exists($jersey->path_jersey)) {
                    Storage::disk('public')->delete($jersey->path_jersey);
                }

                $imagePath = $request->file('path_jersey')->store('jersey', 'public');
                $jersey->path_jersey = $imagePath;
            }

            $jersey->events_id = $request->events_id;
            $jersey->isHome = $request->isHome;
            $jersey->save();

            DB::commit();

            return redirect()->back()->with('success', 'Jersey berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();

            if (isset($imagePath) && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            return redirect()->back()
                ->withErrors(['error' => 'Gagal update jersey: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $jersey = DatJersey::findOrFail($id);

            if ($jersey->path_jersey && Storage::disk('public')->exists($jersey->path_jersey)) {
                Storage::disk('public')->delete($jersey->path_jersey);
            }

            $jersey->delete();

            DB::commit();

            return redirect()->back()->with('success', 'Jersey berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()
                ->withErrors(['error' => 'Gagal hapus jersey: ' . $e->getMessage()]);
        }
    }

    public function form($id)
    {
        $this->atributes['idEvents'] = $id;
        return view("pages.user.jersey.insert", $this->atributes);
    }
}
