<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class usuarioApiTest extends TestCase
{
    use MakeusuarioTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateusuario()
    {
        $usuario = $this->fakeusuarioData();
        $this->json('POST', '/api/v1/usuarios', $usuario);

        $this->assertApiResponse($usuario);
    }

    /**
     * @test
     */
    public function testReadusuario()
    {
        $usuario = $this->makeusuario();
        $this->json('GET', '/api/v1/usuarios/'.$usuario->id);

        $this->assertApiResponse($usuario->toArray());
    }

    /**
     * @test
     */
    public function testUpdateusuario()
    {
        $usuario = $this->makeusuario();
        $editedusuario = $this->fakeusuarioData();

        $this->json('PUT', '/api/v1/usuarios/'.$usuario->id, $editedusuario);

        $this->assertApiResponse($editedusuario);
    }

    /**
     * @test
     */
    public function testDeleteusuario()
    {
        $usuario = $this->makeusuario();
        $this->json('DELETE', '/api/v1/usuarios/'.$usuario->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/usuarios/'.$usuario->id);

        $this->assertResponseStatus(404);
    }
}
