<?php

namespace App\Http\Controllers;

use App\Models\datofficial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class managedOfficialController extends Controller
{
    //
    protected $atributes = [];
    public function store(Request $request)
    {


        DB::beginTransaction();
        try {
            $request->validate([
                'official_name' => 'required|string|max:255',
                'eventsId'      => 'required|integer',
                'path_image'    => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // Upload gambar
            $imagePath = $request->file('path_image')->store('official', 'public');

            // Simpan data official
            datofficial::create([
                'official_name' => $request->official_name,
                'eventsId'      => $request->eventsId,
                'path_image'    => $imagePath,
            ]);

            DB::commit();
            // dd('Sukses, imagePath: ' . $imagePath);
            return redirect()->back()->with('success', 'Official created successfully.');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback jika gagal
            // Hapus file gambar jika sudah ter-upload tapi gagal simpan data
            if (isset($imagePath) && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            // dd('Gagal: ' . $e->getMessage());
            return redirect()->back()->withErrors(['errors' => 'Gagal menyimpan official: ' . $e->getMessage()]);
        }
    }
    public function edit($id)
    {
        $official = DatOfficial::findOrFail($id);

        $this->atributes['officialData'] = $official;

        return view('pages.user.official.edit', $this->atributes);
    }
    public function update(Request $request)
    {


        DB::beginTransaction();

        try {
            $request->validate([
                'id'            => 'required|integer',
                'official_name' => 'required|string|max:255',
                'path_image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $official = DatOfficial::findOrFail($request->id);

            if ($request->hasFile('path_image')) {
                if ($official->path_image && Storage::disk('public')->exists($official->path_image)) {
                    Storage::disk('public')->delete($official->path_image);
                }

                $imagePath = $request->file('path_image')->store('official', 'public');
                $official->path_image = $imagePath;
            }

            $official->official_name = $request->official_name;
            $official->save();

            DB::commit();

            return redirect('/myevent/monitoringAnggota?idevent=' . $official->eventsId)
                ->with('success', 'Official berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();

            if (isset($imagePath) && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            return redirect()->back()
                ->withErrors(['errors' => 'Gagal update official: ' . $e->getMessage()])
                ->withInput();
        }
    }
    public function delete($id)
    {
        DB::beginTransaction();

        try {
            // Cari official berdasarkan ID
            $official = DatOfficial::findOrFail($id);

            // Hapus file image jika ada
            if ($official->path_image && Storage::disk('public')->exists($official->path_image)) {
                Storage::disk('public')->delete($official->path_image);
            }

            // Hapus record
            $official->delete();

            DB::commit();

            return redirect()->route('official.index')->with('success', 'Official deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withErrors(['error' => 'Gagal hapus official: ' . $e->getMessage()]);
        }
    }
    public function form()
    {
        return view("pages.user.official.insert");
    }
}
