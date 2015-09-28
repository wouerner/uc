<?php

namespace App\Http\Controllers;
use App\Models\Passo;
use App\Models\PassoTela;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PassoTelaController extends Controller
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

    public function allById($id)
    {
        //$regras = RegraNegocio::all();
        $regras = Passo::find($id)
               ->telas;
        return response()->json($regras);
    }
    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $tela = new PassoTela();
        //$tela->passo_id = $request->input('passo_id');
        //$tela->tela_id = $request->input('tela_id');

        //$tela->save();

        $passoTela = PassoTela::where('passo_id', $request->input('passo_id'))
                ->delete();

        if ($request->input('tela_id')) {
            foreach($request->input('tela_id') as $id){
                $insert[] = ['tela_id'=>$id, 'passo_id' => $request->input('passo_id') ];
            }

            $tela->insert($insert);
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
        $tela    = tela::find($id);

        $tela->titulo = $request->input('titulo');
        $tela->tag = $request->input('tag');

        $tela->save();
    }

    public function delete()
    {
        return 'delete';
    }

    public function destroy(Request $request, $passo_id, $tela_id)
    {
        $passoTela = PassoTela::where('passo_id', $passo_id)
            ->where('tela_id', $tela_id)
            ->delete();
    }
}
