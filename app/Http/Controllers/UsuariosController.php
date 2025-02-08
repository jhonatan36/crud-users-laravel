<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Usuario::all();

        return response($response, 200)
                  ->header('Content-Type', 'text/json');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nascimento = Carbon::createFromFormat('d/m/Y', $request->nascimento);

        try {
            $response = Usuario::create([
                        'cpf' => $request->cpf,
                        'nome' => $request->nome,
                        'email' => $request->email,
                        'nascimento' => $nascimento,
            ]);

            return response('usuario cadastrado', 201)
                    ->header('Content-Type', 'text/json');
        }catch (Exception $e)   {
            return response($e->getMessage(), 202)
                    ->header('Content-Type', 'text/json');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Usuario::find($id);

        return response($response, 200)
                  ->header('Content-Type', 'text/json');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Usuario::where('id',$id)->update([
                'cpf' => $request->cpf,
                'nome' => $request->nome,
                'email' => $request->email,
                'nascimento' => Carbon::createFromFormat('d/m/Y', $request->nascimento)
            ]);
        
            return response('usuario atualizado', 201)
                    ->header('Content-Type', 'text/json');
        }catch (Exception $e)   {
            return response($e->getMessage(), 202)
                    ->header('Content-Type', 'text/json');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Usuario::destroy($id);
            
            return response('usuario excluído', 201)
                ->header('Content-Type', 'text/json');
        }catch (Exception $e)   {
            return response($e->getMessage(), 202)
                    ->header('Content-Type', 'text/json');
        }
    }
}
