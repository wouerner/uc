<?php

namespace App\Http\Controllers;
use App\Models\Projeto;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ProjetoController extends Controller
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
        return view('projeto.index');
    }

    public function all()
    {
        $projetos = Projeto::all();
        return response()->json($projetos);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $projeto = new Projeto();
        $projeto->titulo = $request->input('titulo');
        $projeto->tag = $request->input('tag');

        $projeto->save();

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
        $projeto    = projeto::find($id);

        $projeto->titulo = $request->input('titulo');
        $projeto->tag = $request->input('tag');

        $projeto->save();
    }

    public function delete()
    {
        return 'delete';
    }

    public function destroy(Request $request, $id)
    {
        $projeto = Projeto::find($id);
        $projeto->delete();
    }
}
