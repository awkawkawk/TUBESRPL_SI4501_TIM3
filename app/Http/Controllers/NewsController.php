<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;
use App\Models\News;
use App\Models\MethodPayment;
use App\Models\MoneyDonation;
use App\Models\Target;
use App\Models\ItemDonation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::get();
        return view('admin.manage.berita.index', compact('news'));
    }
    public function create()
    {
        $news = News::get();
        return view('admin.manage.berita.create', compact('news'));
    }
    public function detail($id)
    {
        $news = News::findOrFail($id);
        return view('admin.manage.berita.detail', compact('news'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'release_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|string',
        ]);
        $dataToUpdate = $request->except(['image']);
        // Mengunggah gambar jika ada
         if ($request->hasFile('image')) {
            $file = $request->file('image')->getRealPath();
            $uploadResult = cloudinary()
                ->upload($file, [
                    'folder' => 'berita',
                ])
                ->getSecurePath();
            $dataToUpdate['image'] = $uploadResult;
        }

        // dd($dataToUpdate);

        News::create($dataToUpdate);

        return redirect()->route('admin.berita.index')->with('success', 'News successfully added');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.manage.berita.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'release_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|string',
        ]);

        $news = News::findOrFail($id);

        $dataToUpdate = $request->except(['image']);
        // Mengunggah gambar jika ada
        if ($request->hasFile('image')) {
            $file = $request->file('image')->getRealPath();
            $uploadResult = cloudinary()
                ->upload($file, [
                    'folder' => 'berita',
                ])
                ->getSecurePath();
            $dataToUpdate['image'] = $uploadResult;
        }

        $news->update($dataToUpdate);

        return redirect()->route('admin.berita.index')->with('success', 'News successfully updated');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

        // Delete the image
        // if (Storage::exists('storage/news_photo/'.$news->image)) {
        //     Storage::delete('storage/news_photo/'.$news->image);
        // }

        $news->delete();

        return redirect()->route('admin.berita.index')->with('success', 'News successfully deleted');
    }
}

