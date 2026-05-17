<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\DatPeserta;
use App\Models\datPosisi;
use Illuminate\Support\Str;

class managedPesertaController extends Controller
{
    protected $atributes = [];

    public function storePeserta(Request $request)
    {


        DB::beginTransaction();

        try {
            $request->validate([
                'id_sekolah' => 'required|integer',
                'id_events' => 'required|integer',
                'namaLengkap' => 'required|string|max:255',
                'id_posisi' => 'required|integer',
                'NIK' => 'required|string|max:16',
                'nomor_jersey' => 'required|integer',
                'tgl_lahir' => 'required|date',
                'nama_ayah' => 'required|string|max:255',
                'nama_ibu' => 'required|string|max:255',
                'status' => 'required|boolean',
                'nomor_handphone' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'email' => 'required|email|max:255',

                'path_kk' => 'required|file|mimes:pdf|max:2048',
                'path_akte' => 'required|file|mimes:pdf|max:2048',
                'path_ijazah' => 'required|file|mimes:pdf|max:2048',
                'path_biodata_lapor' => 'required|file|mimes:pdf|max:2048',
                'path_surat_keterangan_ortu' => 'required|file|mimes:pdf|max:2048',
                'path_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);
            $uploadedFiles = [];

            $fileFields = [
                'path_kk',
                'path_akte',
                'path_ijazah',
                'path_biodata_lapor',
                'path_surat_keterangan_ortu',
                'path_photo',
            ];

            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);

                    $fileName = $field . '_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();

                    $path = $file->storeAs('dokument', $fileName, 'public');

                    $uploadedFiles[$field] = $path;
                }
            }

            DatPeserta::create([
                'id_sekolah' => $request->id_sekolah,
                'id_events' => $request->id_events,
                'namaLengkap' => $request->namaLengkap,
                'id_posisi' => $request->id_posisi,
                'NIK' => $request->NIK,
                'nomor_jersey' => $request->nomor_jersey,
                'tgl_lahir' => $request->tgl_lahir,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'status' => $request->status,
                'nomor_handphone' => $request->nomor_handphone,
                'alamat' => $request->alamat,
                'email' => $request->email,

                'path_kk' => $uploadedFiles['path_kk'],
                'path_akte' => $uploadedFiles['path_akte'],
                'path_ijazah' => $uploadedFiles['path_ijazah'],
                'path_biodata_lapor' => $uploadedFiles['path_biodata_lapor'],
                'path_surat_keterangan_ortu' => $uploadedFiles['path_surat_keterangan_ortu'],
                'path_photo' => $uploadedFiles['path_photo'],

                'created_by' =>  'system',
                'create_by' => 'system',
            ]);

            DB::commit();

            return redirect()
                ->back()
                ->with('success', 'Data peserta berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollBack();

            if (!empty($uploadedFiles)) {
                foreach ($uploadedFiles as $filePath) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            return redirect()->back()->with('error', 'Data gagal disimpan: ' . $e->getMessage());
        }
    }
    public function updatePeserta(Request $request, $id)
    {
        $uploadedFiles = [];
        $oldFilesToDelete = [];

        DB::beginTransaction();

        try {
            $peserta = DatPeserta::findOrFail($id);

            $request->validate([
                'id_sekolah' => 'required|integer',
                'id_events' => 'required|integer',
                'namaLengkap' => 'required|string|max:255',
                'id_posisi' => 'required|integer',
                'NIK' => 'required|string|max:16',
                'nomor_jersey' => 'required|integer',
                'tgl_lahir' => 'required|date',
                'nama_ayah' => 'required|string|max:255',
                'nama_ibu' => 'required|string|max:255',
                'status' => 'required|boolean',
                'nomor_handphone' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'email' => 'required|email|max:255',

                'path_kk' => 'nullable|file|mimes:pdf|max:2048',
                'path_akte' => 'nullable|file|mimes:pdf|max:2048',
                'path_ijazah' => 'nullable|file|mimes:pdf|max:2048',
                'path_biodata_lapor' => 'nullable|file|mimes:pdf|max:2048',
                'path_surat_keterangan_ortu' => 'nullable|file|mimes:pdf|max:2048',
                'path_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $data = [
                'id_sekolah' => $request->id_sekolah,
                'id_events' => $request->id_events,
                'namaLengkap' => $request->namaLengkap,
                'id_posisi' => $request->id_posisi,
                'NIK' => $request->NIK,
                'nomor_jersey' => $request->nomor_jersey,
                'tgl_lahir' => $request->tgl_lahir,
                'nama_ayah' => $request->nama_ayah,
                'nama_ibu' => $request->nama_ibu,
                'status' => $request->status,
                'nomor_handphone' => $request->nomor_handphone,
                'alamat' => $request->alamat,
                'email' => $request->email,
            ];

            $fileFields = [
                'path_kk',
                'path_akte',
                'path_ijazah',
                'path_biodata_lapor',
                'path_surat_keterangan_ortu',
                'path_photo',
            ];

            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);

                    $fileName = $field . '_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();

                    $path = $file->storeAs('dokument', $fileName, 'public');

                    $uploadedFiles[$field] = $path;
                    $data[$field] = $path;

                    if (!empty($peserta->$field)) {
                        $oldFilesToDelete[] = $peserta->$field;
                    }
                }
            }

            $peserta->update($data);

            DB::commit();

            foreach ($oldFilesToDelete as $oldFile) {
                Storage::disk('public')->delete($oldFile);
            }

            return redirect()
                ->back()
                ->with('success', 'Data peserta berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();

            if (!empty($uploadedFiles)) {
                foreach ($uploadedFiles as $filePath) {
                    Storage::disk('public')->delete($filePath);
                }
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Data gagal diperbarui: ' . $e->getMessage());
        }
    }
    public function deletePeserta($id)
    {
        DB::beginTransaction();

        try {
            $peserta = DatPeserta::findOrFail($id);

            $fileFields = [
                'path_kk',
                'path_akte',
                'path_ijazah',
                'path_biodata_lapor',
                'path_surat_keterangan_ortu',
                'path_photo',
            ];

            $filesToDelete = [];

            foreach ($fileFields as $field) {
                if (!empty($peserta->$field)) {
                    $filesToDelete[] = $peserta->$field;
                }
            }

            $peserta->delete();

            DB::commit();

            foreach ($filesToDelete as $filePath) {
                Storage::disk('public')->delete($filePath);
            }

            return redirect()
                ->back()
                ->with('success', 'Data peserta berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Data gagal dihapus: ' . $e->getMessage());
        }
    }
    public function editPeserta($id)
    {
        $peserta = DatPeserta::findOrFail($id);

        // Sesuaikan model posisi kamu
        $posisi = datPosisi::all();

        return view('pages.user.editpeserta', compact('peserta', 'posisi'));
    }
}
