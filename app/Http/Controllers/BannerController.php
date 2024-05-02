<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{

    public function getJsonBanner()
    {
        return response()->json(Banner::orderByRaw("type = 'MAIN' DESC")
            ->orderBy('order')
            ->get());
    }

    public function index()
    {
        return view('management/banner', [
            'banners' => Banner::orderByRaw("type = 'MAIN' DESC")
                ->orderBy('order')
                ->get()
        ]);
    }

    public function edit(Banner $banner)
    {
        return view('management/banner-edit', [
            'banner' => $banner
        ]);
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10048',
            'order' => 'required|integer'
        ]);

        $existingBanner = Banner::where('order', $request->order)->first();
        if ($existingBanner && $existingBanner->id !== $banner->id) {
            $increment = $existingBanner->order < $banner->order ? -1 : 1;
            Banner::where('order', '>=', $request->order)
                ->where('id', '!=', $banner->id)
                ->where('type', $banner->type)
                ->update(['order' => DB::raw("`order` + $increment")]);
        }

        $banner->title = $request->title;
        $banner->order = $request->order;

        if ($request->hasFile('image')) {
            Storage::delete(str_replace(config('app.url') . '/storage/', 'public/', $banner->image));
            $path = $request->file('image')->store('public/banners');
            $banner->image = config('app.url') . '/' . str_replace('public', 'storage', $path);
        }

        $banner->save();

        return redirect()->route('management.banner');
    }

}
