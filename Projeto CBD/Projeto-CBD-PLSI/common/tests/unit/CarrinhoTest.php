<?php


namespace common\tests\Unit;

use common\models\Carrinho;
use common\tests\UnitTester;

class CarrinhoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testCarrinhoQuantInvalido()
    {
        $carrinho = new Carrinho();
        $carrinho->quant = null;
        $carrinho->dadosPessoais_id = 3;
        $carrinho->produto_id = 2;

        $this->assertFalse($carrinho->validate());
    }
    public function testCarrinhoDadosPessoaisInvalido()
    {
        $carrinho = new Carrinho();
        $carrinho->quant = 2;
        $carrinho->dadosPessoais_id = null;
        $carrinho->produto_id = 2;

        $this->assertFalse($carrinho->validate());
    }
    public function testCarrinhoProdutoInvalido()
    {
        $carrinho = new Carrinho();
        $carrinho->quant = 2;
        $carrinho->dadosPessoais_id = 3;
        $carrinho->produto_id = null;

        $this->assertFalse($carrinho->validate());
    }
    public function testCarrinhoSave()
    {
        $carrinho = new Carrinho();
        $carrinho->quant = 2;
        $carrinho->dadosPessoais_id = 3;
        $carrinho->produto_id = 2;

        $this->assertTrue($carrinho->save());
    }
    public function testCarrinhoEditar()
    {
        $carrinho = Carrinho::find()->where(['dadosPessoais_id' => 3,'produto_id'=> 2])->one();
        $carrinho->quant = 3;

        $this->assertTrue($carrinho->save());
    }
    public function testApagarCarrinho()
    {
        $carrinho = Carrinho::find()->where(['dadosPessoais_id' => 3,'produto_id'=> 2])->one();

        $this->assertIsNumeric($carrinho->delete());
    }
}
