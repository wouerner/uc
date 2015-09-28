<?php

namespace App\Http\Controllers;
use App\Models\PassoRegraNegocio;
use App\Models\Passo;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PassoRegraNegocioController extends Controller
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
        $regras = Passo::find($id)
               ->regrasNegocio;
        return response()->json($regras);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $regra = new PassoRegraNegocio();
        //$regra->passo_id = $request->input('passo_id');
        //$regra->regra_negocio_id = $request->input('regra_negocio_id');

        //$regra->save();

        PassoRegraNegocio::where('passo_id', $request->input('passo_id'))
                ->delete();

        if ($request->input('regra_negocio_id')) {
            foreach($request->input('regra_negocio_id') as $id){
                $insert[] = ['regra_negocio_id'=>$id, 'passo_id' => $request->input('passo_id') ];
            }

            $regra->insert($insert);
        }

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
