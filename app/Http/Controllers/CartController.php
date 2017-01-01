<?php
namespace CodeCommerce\Http\Controllers;
use Cagartner\CorreiosConsulta\CorreiosConsulta;

// Atencao a classe Cart não extende de model
use CodeCommerce\Cart;
// Atencao a classe FreteTotal nao é model
use CodeCommerce\FreteTotal;

use CodeCommerce\Frete;

use Illuminate\Http\Request;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Response;


class CartController extends Controller
{
    private $cart;
    private $product;
    private $freteTotal;
	private $buscafrete;
	
    public function __construct(
        Cart $cart,
        Product $product,
        CorreiosConsulta $consulta,
        Frete $buscafrete,
        FreteTotal $freteTotal)
    {

        $this->cart     = $cart;
        $this->product  = $product;
		$this->consulta	= $consulta;
		$this->buscafrete  = $buscafrete;
        $this->freteTotal  = $freteTotal;
    }
	
    public function index()
    {
        // SE NÃO TIVER UMA SESSAO CART ENTAO INCIA-SE SESSAO CART
        if(!Session::has('cart'))
        {
            Session::set('cart', $this->cart);
        }

        if(!Session::has('freteTotal'))
        {
            Session::set('freteTotal', $this->freteTotal);
        }

        //RETIROU O CONTEUDO DA SESSÃO E PASSOU PARA VIEW
        return view('store.cart', ['cart' => Session::get('cart'), 'freteTotal' => Session::get('freteTotal')]);
    }


    public function add($id)
    {
        $cart = $this->getCart();
        $product = $this->product->find($id);
        $cart->add($id, $product->name, $product->price);

        Session::set('cart', $cart);
        return redirect()->route('store.cart');
    }

    public function addfrete(Request $request)
    {

        $dados = [
            'tipo'              => 'pac', // opções: `sedex`, `sedex_a_cobrar`, `sedex_10`, `sedex_hoje`, `pac`, 'pac_contrato', 'sedex_contrato' , 'esedex'
            'formato'           => 'caixa', // opções: `caixa`, `rolo`, `envelope`
            'cep_destino'       => $request->cep, // Obrigatório
            'cep_origem'        => '71680360', // Obrigatorio
            //'empresa'         => '', // Código da empresa junto aos correios, não obrigatório.
            //'senha'           => '', // Senha da empresa junto aos correios, não obrigatório.
            'peso'              => '1', // Peso em kilos
            'comprimento'       => '16', // Em centímetros
            'altura'            => '11', // Em centímetros
            'largura'           => '11', // Em centímetros
            'diametro'          => '0', // Em centímetros, no caso de rolo
            // 'mao_propria'       => '1', // Não obrigatórios
            // 'valor_declarado'   => '1', // Não obrigatórios
            // 'aviso_recebimento' => '1', // Não obrigatórios
        ];

        $fretes = $this->consulta->frete($dados);


         $adf = new Cart();

         return $adf->fadd($fretes);


        //return Response::json($fretes);

        /*
        $frete = $this->getFrete();
        Session::set('frete',$frete);
        return redirect()->route('store.cart');

        /*
        $frete = new Cart();
        $frete->fadd($id, $request->cep);
        */
    }

    public function destroy($id)
    {
        $cart = $this->getCart();
        $cart->remove($id);

        Session::set('cart', $cart);

        return redirect()->route('store.cart');
    }
    /**
     * @return Cart
     */
    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }
        return $cart;
    }
/*
    public function getFrete()
    {
        if (Session::has('freteTotal')) {

            $cartFrete = Session::get('freteTotal');

        } else {

            $cartFrete = $this->freteTotal;

        }
        return $cartFrete;
    }
*/
    public function update(Requests\CartRequest $request, $id)
    {
        $qtd = $request->get("qtd");

        $cart = $this->getCart();
        $cart->setQtd($id, $qtd);

        Session::set('cart', $cart);
        return redirect()->route('store.cart');
    }
	
	// IGUAL UM REQUEST
	
	public function buscaFrete($cep)
    {

        $dados = [
            'tipo'              => 'pac', // opções: `sedex`, `sedex_a_cobrar`, `sedex_10`, `sedex_hoje`, `pac`, 'pac_contrato', 'sedex_contrato' , 'esedex'
            'formato'           => 'caixa', // opções: `caixa`, `rolo`, `envelope`
            'cep_destino'       => $cep, // Obrigatório
            'cep_origem'        => '08465312', // Obrigatorio
            //'empresa'         => '', // Código da empresa junto aos correios, não obrigatório.
            //'senha'           => '', // Senha da empresa junto aos correios, não obrigatório.
            'peso'              => '1', // Peso em kilos
            'comprimento'       => '16', // Em centímetros
            'altura'            => '11', // Em centímetros
            'largura'           => '11', // Em centímetros
            'diametro'          => '0', // Em centímetros, no caso de rolo
            // 'mao_propria'       => '1', // Não obrigatórios
            // 'valor_declarado'   => '1', // Não obrigatórios
            // 'aviso_recebimento' => '1', // Não obrigatórios
        ];

		/*
		$tdado 	= $this->buscafrete->find($id);

        $fretes = $this->consulta->frete([
				'tipo' 			=> $tdado->tipo,
				'formato' 		=> $tdado->formato,
				'cep_destino'   => '71680366', // Obrigatório
				'cep_origem'	=> $tdado->cep_origem,
				'peso'			=> $tdado->peso,
				'comprimento'	=> $tdado->comprimento,
				'altura'		=> $tdado->altura,
				'largura'		=> $tdado->largura,
				'diametro'		=> $tdado->diametro
			]);
        //return Response::json($fretes);

		$fretes = $this->consulta->frete($dados);
        //return Response::json($fretes);

        return Response::json($fretes);
		


			AQUI ESTA A MAIOR DÚVIDA!!!!
			
			COMO EU FAÇO APARECER NA VIEW PORQUE SO CONSEGUI FAZER ASSIM !!!
			
			TEM COMO ME AJUDAR?
			OBRIGADO PELA ATENÇÃO....
		*/
        /*
        @foreach($fretes as $frete)
            {{$frete->valor}}
        @endforeach
        */
        //return view('store.cart', compact('fretes'));

        $fretes = $this->consulta->frete($dados);
        return Response::json($fretes);
    }
}