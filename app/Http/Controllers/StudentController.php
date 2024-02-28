<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'Father' => 'required|string',
            'Mother' => 'required|string',
            'age' => 'required|integer',
            'name_teacher' => 'required|string',
            'Personal_number' => 'required|integer',
            'Phon_number' => 'required|integer',
        ]);

        $student = Student::create($request->all());
        return response()->json($student, 201);
    }
    
    public function show($id)
    {
        try {
            $student = Student::findOrFail($id);
            return response()->json($student);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string',
            'Father' => 'string',
            'Mother' => 'string',
            'age' => 'integer',
            'name_teacher' => 'string',
            'Personal_number' => 'integer',
            'Phon_number' => 'integer',
        ]);

        try {
            $student = Student::findOrFail($id);
            $student->update($request->all());
            return response()->json($student);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }
    
    public function destroy($id)
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();
            return response()->json(['message' => 'Deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Not Found'], 404);
        }
    }
}
