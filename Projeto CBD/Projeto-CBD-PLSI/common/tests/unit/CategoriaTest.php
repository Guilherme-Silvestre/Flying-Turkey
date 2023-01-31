<?php


namespace common\tests\Unit;

use common\models\Categoria;
use common\tests\UnitTester;

class CategoriaTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // tests
    public function testCategoriaNomeInvalido()
    {
        $categoria = new Categoria();
        $categoria->nome = null;

        $this->assertFalse($categoria->validate());
    }
    public function testCategoriaSave()
    {
        $categoria = new Categoria();
        $categoria->nome = 'categoria teste';

        $this->assertTrue($categoria->save());
    }
    public function testCategoriaEditar()
    {
        $categoria = Categoria::find()->where(['nome' => 'categoria teste'])->one();
        $categoria->nome = 'categoria teste 123';

        $this->assertTrue($categoria->save());
    }
    public function testApagarCategoria()
    {
        $categoria = Categoria::find()->where(['nome' => 'categoria teste 123'])->one();
        $this->assertIsNumeric($categoria->delete());
    }
}
