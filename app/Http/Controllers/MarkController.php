<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // يمكنك عرض قائمة العلامات هنا
        $mark = Mark::all();
        return response()->json($mark);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // قم بالتحقق من البيانات وحفظ العلامة في قاعدة البيانات
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject' => 'required|string',
            'score' => 'required|numeric',
        ]);

        $mark = Mark::create($request->all());

        return response()->json(['message' => 'تم إنشاء العلامة بنجاح', 'data' => $mark], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // قم بالتحقق من البيانات وتحديث العلامة ذات الهوية المحددة
        $request->validate([
            'subject' => 'string',
            'score' => 'numeric',
        ]);

        $mark = Mark::find($id);

        $mark->update($request->all());

        return response()->json(['message' => 'تم تحديث العلامة بنجاح', 'data' => $mark]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // حذف العلامة ذات الهوية المحددة
        $mark = Mark::find($id);
        $mark->delete();

        return response()->json(['message' => 'تم حذف العلامة بنجاح']);
    }
}
