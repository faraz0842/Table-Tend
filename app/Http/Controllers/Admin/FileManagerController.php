<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FileManager;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FileManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Media  $media
     * @return View
     */
    public function index(Media $media): View
    {
        $files = FileManager::all();
        $images = $media->get();

        return view('admin.media.index')->with(['files' => $files, 'images' => $images]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $file = FileManager::create($request->all());
            $file->addMedia(storage_path('tmp/uploads/' . $request->image))->toMediaCollection('file.image');

            if ($file) {
                return redirect('file.index')->withSuccess(__('file_created_successfully'));
            } else {
                return back()->withError(__('something_went_wrong!'));
            }
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }

    /**
     * Upload the specified resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function upload(Request $request): JsonResponse
    {
        try {
            $path = storage_path('tmp/uploads');

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file = $request->file('file');

            $name = uniqid() . '_' . trim($file->getClientOriginalName());

            $file->move($path, $name);

            return response()->json([
                'name' => $name,
                'original_name' => $file->getClientOriginalName(),
            ]);
        } catch (Exception $ex) {
            return redirect()->back()->withError('something_went_wrong!');
        }
    }

    /**
     * Get the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function getImage($id): JsonResponse
    {
        $image = Media::find($id);
        if ($image) {
            return response()->json(['image_url' => $image->getUrl(), 'file_path' => $image->getPath()]);
        } else {
            return response()->json(['error' => 'Image not found']);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  Media  $media
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        try {
            $is_deleted = Media::find($id)->delete();
            if ($is_deleted) {
                return redirect()->back()->withSuccess(__('file_deleted_Successfully'));
            } else {
                return back()->withError(__('something_went_wrong!'));
            }
        } catch (Exception $ex) {
            return back()->withError(__('something_went_wrong!'));
        }
    }
}
