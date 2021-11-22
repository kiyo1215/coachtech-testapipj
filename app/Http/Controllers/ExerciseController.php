<?php

namespace App\Http\Controllers;

use App\Models\Exercise;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
{
  $items = Exercise::all();
  return response()->json([
    'data' => $items
  ], 200);
}
public function store(Request $request)
{
  $item = Exercise::create($request->all());
  return response()->json([
    'data' => $item
  ], 201);
}
public function show(Exercise $exercise)
{
  $item = Exercise::find($exercise);
  if ($item) {
    return response()->json([
      'data' => $item
      ], 200);
  } else {
    return response()->json([
      'message' => 'Not found',
    ], 404);
  }
}
public function update(Request $request, Exercise $exercise)
{
$update = [
'name' => $request->name,
'email' => $request->email,
'profile' => $request->profile
];
$item = Exercise::where('id', $exercise->id)->update($update);
if ($item) {
return response()->json([
  'message' => 'Updated successfully',
        ], 200);
    } else {
      return response()->json([
        'message' => 'Not found',
      ], 404);
    }
  }
  public function destroy(Exercise $exercise)
{
  $item = Exercise::where('id', $exercise->id)->delete();
  if ($item) {
    return response()->json([
      'message' => 'Deleted successfully',
    ], 200);
  } else {
    return response()->json([
      'message' => 'Not found',
    ], 404);
  }
}
}
