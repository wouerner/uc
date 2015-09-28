<?php

namespace App\Http\Controllers;
use App\Models\PassoRegraNegocio;
use App\Models\Passo;
use App\Models\Mensagem;
use App\Models\PassoMensagem;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PassoMensagemController extends Controller
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
        $mensagem = Mensagem::all();
        return response()->json($mensagem);
    }

    public function allById($id)
    {
        //$regras = RegraNegocio::all();
        $regras = Passo::find($id)
               ->mensagens;
        return response()->json($regras);
    }

    public function create()
    {
        return 'create';
    }

    public function store(Request $request)
    {
        $passo = new PassoMensagem();
        //$regra->passo_id = $request->input('passo_id');
        //$regra->mensagem_id = $request->input('mensagem_id');

        //$regra->save();

        //$tela = new PassoTela();
        //$tela->passo_id = $request->input('passo_id');
        //$tela->tela_id = $request->input('tela_id');

        //$tela->save();

        $passoMensagem = PassoMensagem::where('passo_id', $request->input('passo_id'))
                ->delete();

        if ($request->input('mensagem_id')) {
            foreach($request->input('mensagem_id') as $id){
                $insert[] = ['mensagem_id'=>$id, 'passo_id' => $request->input('passo_id') ];
            }

            $passo->insert($insert);
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
