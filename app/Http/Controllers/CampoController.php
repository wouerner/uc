<?php

namespace App\Http\Controllers;
use App\Models\Passo;
use App\Models\Campo;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class CampoController extends Controller
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
        $produtos = Passo::all();
        return view('documento.index');
    }

    public function all($id)
    {
        //$campo = Campo::all();
        //return response()->json($campo);

       $campos = Campo::where('documento_id', $id)
               ->get();
        return response()->json($campos);
    }

    public function allById($id)
    {
        //$campo = Campo::all();
        //return response()->json($campo);

       $campos = Campo::where('tela_id', $id)
               ->get();
        return response()->json($campos);
    }

    public function store(Request $request)
    {
        $campo = new Campo();
        $campo->nome = $request->input('nome');
        $campo->descricao = $request->input('descricao');
        $campo->tela_id = $request->input('tela_id');

        $campo->save();

        return response()->json(array(
                'error' => false,
                'urls' => ['teste'=>1000],
                200
            ));
    }
    public function update(Request $request, $id)
    {
        $campo = Campo::find($id);

        $campo->nome = $request->input('nome');
        $campo->descricao = $request->input('descricao');

        $campo->save();
    }

    public function destroy(Request $request, $id)
    {
        $campo = Campo::find($id);
        $campo->delete();
    }
}
