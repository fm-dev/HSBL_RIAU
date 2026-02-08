<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\datMenuParent;
use App\Models\datMenuChild;
use App\Models\datrefrole;

class GeneralController extends Controller
{
    /**
     * Get menu list berdasarkan Role ID
     */
    public function getMenuByRole($roleId)
    {
        // Get all menu children berdasarkan roleId
        $menuChildren = datMenuChild::where('roleId', $roleId)->get();
        
        // Get unique parent IDs
        $parentIds = $menuChildren->pluck('parentId')->unique();
        
        // Get parent menus
        $menuParents = datMenuParent::whereIn('id', $parentIds)->get();
        
        // Build menu structure
        $menus = [];
        foreach ($menuParents as $parent) {
            $children = $menuChildren->where('parentId', $parent->id);
            $menus[] = [
                'id' => $parent->id,
                'labelMenu' => $parent->labelMenu,
                'path' => $parent->path,
                'children' => $children->map(function($child) {
                    return [
                        'id' => $child->id,
                        'labelMenu' => $child->labelMenu,
                        'path' => $child->path,
                        'parentId' => $child->parentId,
                    ];
                })->toArray()
            ];
        }
        
        return $menus;
    }

    /**
     * Get menu untuk user yang sedang login
     */
    public function ShowListMenu()
    {
        $user = Auth::user();
        
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        
        // Get roleId dari user
        $roleId = $user->role; // sesuaikan dengan nama kolom role di tabel users
        $menus = $this->getMenuByRole($roleId);
        
        return response()->json($menus);
    }

    /**
     * Dashboard admin dengan dynamic menu
     */
    public function adminDashboard()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('portal.admin.login');
        }
        
        $roleId = $user->role;
        $menus = $this->getMenuByRole($roleId);
        return view('admin.dashboard', ['menus' => $menus]);
    }
}
