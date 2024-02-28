<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return response()->json(['lessons' => $lessons], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'video' => 'mimetypes:video/mp4|max:10240',
            'file' => 'max:10240',
            'title' => 'required|string|max:255',
        ]);

        $lesson = Lesson::create([
            'title' => $request->input('title'),
        ]);

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoFileName = time() . '_' . $video->getClientOriginalName();
            $videoPath = $video->storeAs('videos', $videoFileName, 'public');
            $lesson->update(['video_path' => $videoPath]);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileFileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('files', $fileFileName, 'public');
            $lesson->update(['file_path' => $filePath]);
        }

        return response()->json(['message' => 'تم رفع الدرس بنجاح'], 200);
    }

    public function show($id)
    {
        $lesson = Lesson::find($id);
        return response()->json(['lesson' => $lesson], 200);
    }

    public function edit($id)
    {
        $lesson = Lesson::find($id);
        return response()->json(['lesson' => $lesson], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'video' => 'mimetypes:video/mp4|max:10240',
            'file' => 'max:10240',
            'title' => 'required|string|max:255',
        ]);

        $lesson = Lesson::find($id);

        $lesson->update([
            'title' => $request->input('title'),
        ]);

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoFileName = time() . '_' . $video->getClientOriginalName();
            $videoPath = $video->storeAs('videos', $videoFileName, 'public');
            $lesson->update(['video_path' => $videoPath]);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileFileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('files', $fileFileName, 'public');
            $lesson->update(['file_path' => $filePath]);
        }

        return response()->json(['message' => 'تم تحديث الدرس بنجاح'], 200);
    }

    public function destroy($id)
    {
        $lesson = Lesson::find($id);
        $lesson->delete();
        return response()->json(['message' => 'تم حذف الدرس بنجاح'], 200);
    }
}
