<?php


namespace common\tests\Unit;

use common\models\Categoria;
use common\tests\UnitTester;
use common\models\Produto;

class ProdutoTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testProdutoNomeNulo()
    {
        $produto = new Produto();
        $produto->nome = null;
        $produto->descricao = 'descricao';
        $produto->preco = 15;
        $produto->stock = 10;
        $produto->categoria_id = 1;

        $this->assertFalse($produto->validate());
    }
    public function testProdutoDescricaoInvalida()
    {
        $produto = new Produto();
        $produto->nome = 'oleo cbd';
        $produto->descricao = 12345;
        $produto->preco = 15;
        $produto->stock = 10;
        $produto->categoria_id = 1;

        $this->assertFalse($produto->validate());
    }
    public function testProdutoPrecoInvalido()
    {
        $produto = new Produto();
        $produto->nome = 'oleo cbd';
        $produto->descricao = 'descricao';
        $produto->preco = null;
        $produto->stock = 10;
        $produto->categoria_id = 1;

        $this->assertFalse($produto->validate());
    }
    public function testProdutoStockInvalido()
    {
        $produto = new Produto();
        $produto->nome = 'oleo cbd';
        $produto->descricao = 'descricao';
        $produto->preco = 15;
        $produto->stock = null;
        $produto->categoria_id = 1;

        $this->assertFalse($produto->validate());
    }
    public function testProdutoCategoriaInvalido()
    {
        $produto = new Produto();
        $produto->nome = 'oleo cbd';
        $produto->descricao = 'descricao';
        $produto->preco = 15;
        $produto->stock = 10;
        $produto->categoria_id = null;

        $this->assertFalse($produto->validate());
    }
    public function testProdutoSave()
    {
        $produto = new Produto();
        $produto->nome = 'oleo cbd';
        $produto->descricao = 'descricao';
        $produto->preco = 15;
        $produto->stock = 10;
        $produto->categoria_id = 1;

        $this->assertTrue($produto->save());
    }
    /*public function testProdutoVerificar()
    {
        $this->tester->seeInDatabase(Produto::tableName(), ['nome' => 'oleo cbd']);
    }*/
    public function testProdutoEditar()
    {
        $produto = Produto::find()->where(['nome' => 'oleo cbd'])->one();
        $produto->nome = 'oleo cbd 123';

        $this->assertTrue($produto->save());
    }
    /*public function testVerProdutoAtualizado()
    {
        $this->tester->seeInDatabase(Produto::tableName(), ['nome' => 'oleo cbd 123']);
    }*/
    public function testApagarProduto()
    {
        $produto = Produto::find()->where(['nome' => 'oleo cbd 123'])->one();
        $this->assertIsNumeric($produto->delete());
    }

    /*public function testVerSeProdutoApagado()
    {
        $this->tester->dontSeeInDatabase(Produto::tableName(), ['nome' => 'oleo cbd 123']);
    }*/
}
