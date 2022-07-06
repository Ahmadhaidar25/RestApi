<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response([
            'data' => $user
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
     $post = new User;
     $post->name = $request->name;
     $post->email = $request->email;
     $post->password = Hash::make($request->password);
     $post->save();
     return response([
        'success'=>true,
        'message'=>'berhasil',
        'data'=> $post

    ]);
 }

 
 public function show($id)
 {
    $delete = User::find($id);

    if ($delete) {
       $delete->delete();
       return response()->json([
        'success' => true,
        'message' => 'delete data success'
    ],200);
   }else{
    return response()->json([
        'success' => false,
        'message' => 'not found'
    ],404); 
}

}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $detail=User::find($id);
       return response()->json([
          'success' => true,
          'message' => 'detail data',
          'datas' => $detail
      ],200);
   }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = User::find($id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->password = Hash::make($request->password);
        $post->update();
        return response([
            'success'=>true,
            'message'=>'data berhasil di ubah',
            'data'=> $post

        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
