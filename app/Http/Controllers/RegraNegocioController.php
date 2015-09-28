<?php

namespace App\Http\Controllers;
use App\Models\Documento;
use App\Models\RegraNegocio;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class RegraNegocioController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $regra = RegraNegocio::where('id', $id)
               ->get()->first();
        return response()->json($regra);
    }

    /**
     * index
     *
     * @access public
     * @return void
     */
    public function index()
    {
        return view('documento.index');
    }

    public function all()
    {
        $regras = RegraNegocio::all();
        return response()->json($regras);
    }

    public function allById($id)
    {
        //$regras = RegraNegocio::all();
        $regras = RegraNegocio::where('passo_id', $id)
               ->get();
        return response()->json($regras);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $regra = new RegraNegocio();
        $regra->descricao = $request->input('descricao');
        $regra->tag = $request->input('tag');

        $regra->save();

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
        $regra = RegraNegocio::find($id);

        $regra->descricao = $request->input('descricao');
        $regra->tag = $request->input('tag');

        $regra->save();
    }

    public function destroy(Request $request, $id)
    {
        $regra = RegraNegocio::find($id);
        $regra->delete();
    }
}
