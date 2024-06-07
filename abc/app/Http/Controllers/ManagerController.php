<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenggunaOlahraga;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {
        // Retrieve all manager with jenis_pengguna 'pengelola' from the database
        $managers = PenggunaOlahraga::where('jenis_pengguna', 'pengelola')->get();

        // Pass the manager data to the view
        return view('manager.manager', compact('managers'));
    }


    public function show_member($id_pengguna)
    {
        // Retrieve the member with the given ID from the database
        $member = PenggunaOlahraga::findOrFail($id_pengguna);

        // Pass the member data to the view
        return view('manager.manager_show', compact('member'));
    }
    public function destroy_member($id)
    {
        // Find the member by ID
        $member = PenggunaOlahraga::findOrFail($id);

        // Delete the member
        $member->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Member has been deleted successfully.');
    }

    // Method untuk menyimpan member baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:pengguna_olahraga,username_pengguna',
            'password' => 'required|min:6',
        ]);

        PenggunaOlahraga::create([
            'username_pengguna' => $request->username,
            'password_pengguna' => Hash::make($request->password),
            'jenis_pengguna' => 'pengelola',
            'created_by' => 'admin', // Nilai default 'admin'      
            'updated_by' => 'admin', // Nilai default 'admin'      
        ]);

        return redirect()->back()->with('success', 'Member berhasil ditambahkan.');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
