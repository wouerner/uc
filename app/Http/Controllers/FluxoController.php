<?php

namespace App\Http\Controllers;
use App\Models\Passo;
use App\Models\Fluxo;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class FluxoController extends Controller
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
        //$fluxo = Fluxo::all();
        //return response()->json($fluxo);

       $fluxos = Fluxo::where('documento_id', $id)
               ->get();
        return response()->json($fluxos);
    }

    public function store(Request $request)
    {
        $fluxo = new Fluxo();
        $fluxo->titulo = $request->input('titulo');
        $fluxo->nome = $request->input('nome');
        $fluxo->tag = $request->input('tag');
        $fluxo->documento_id = $request->input('documento_id');

        $fluxo->save();

        return response()->json(array(
                'error' => false,
                'urls' => ['teste'=>1000],
                200
            ));
    }
    public function update(Request $request, $id)
    {
        $fluxo = Fluxo::find($id);

        $fluxo->titulo = $request->input('titulo');
        $fluxo->nome = $request->input('nome');
        $fluxo->tag = $request->input('tag');

        $fluxo->save();
    }

    public function destroy(Request $request, $id)
    {
        $fluxo = Fluxo::find($id);
        $fluxo->delete();
    }
}
