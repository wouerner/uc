<?php

namespace App\Http\Controllers;
use App\Models\Tela;
use App\Models\PassoTela;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class TelaController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        return 'show';
    }

    /**
     * index
     *
     * @access public
     * @return void
     */
    public function index()
    {
        return view('tela.index');
    }

    public function all()
    {
        $telas = Tela::all();
        return response()->json($telas);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $tela = new Tela();
        $tela->titulo = $request->input('titulo');
        $tela->tag = $request->input('tag');
        $tela->caminho = $request->input('caminho');

        $tela->save();

        return response()->json(array(
                'error' => false,
                'urls' => ['teste'=>1000],
                200
            ));
    }
    public function edit()
    {
        return 'edit';
    }

    public function update(Request $request, $id)
    {
        $tela    = tela::find($id);

        $tela->titulo = $request->input('titulo');
        $tela->tag = $request->input('tag');

        $tela->save();
    }

    public function delete()
    {
        return 'delete';
    }

    public function destroy(Request $request, $id)
    {
        $tela = tela::find($id);
        $tela->delete();
    }
}
