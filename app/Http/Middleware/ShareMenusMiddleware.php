<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\datMenuParent;
use App\Models\datMenuChild;
use Symfony\Component\HttpFoundation\Response;

class ShareMenusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $menus = [];
        
        if (Auth::check()) {
            $user = Auth::user();
            // Cast role ke integer karena field role adalah string di database
            $roleId = (int)$user->role;
            
            // Get all menu children berdasarkan roleId
            $menuChildren = datMenuChild::where('roleId', $roleId)->get();
            
            // Get unique parent IDs
            $parentIds = $menuChildren->pluck('parentId')->unique();
            
            // Get parent menus berdasarkan roleId
            $menuParents = datMenuParent::where('roleId', $roleId)->whereIn('id', $parentIds)->get();
            
            // Build menu structure
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
        }
        
        // Share menus with all views
        view()->share('menus', $menus);
        
        return $next($request);
    }
}
