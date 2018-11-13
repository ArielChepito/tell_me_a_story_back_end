<?php

use App\Models\usuario;
use App\Repositories\usuarioRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class usuarioRepositoryTest extends TestCase
{
    use MakeusuarioTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var usuarioRepository
     */
    protected $usuarioRepo;

    public function setUp()
    {
        parent::setUp();
        $this->usuarioRepo = App::make(usuarioRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateusuario()
    {
        $usuario = $this->fakeusuarioData();
        $createdusuario = $this->usuarioRepo->create($usuario);
        $createdusuario = $createdusuario->toArray();
        $this->assertArrayHasKey('id', $createdusuario);
        $this->assertNotNull($createdusuario['id'], 'Created usuario must have id specified');
        $this->assertNotNull(usuario::find($createdusuario['id']), 'usuario with given id must be in DB');
        $this->assertModelData($usuario, $createdusuario);
    }

    /**
     * @test read
     */
    public function testReadusuario()
    {
        $usuario = $this->makeusuario();
        $dbusuario = $this->usuarioRepo->find($usuario->id);
        $dbusuario = $dbusuario->toArray();
        $this->assertModelData($usuario->toArray(), $dbusuario);
    }

    /**
     * @test update
     */
    public function testUpdateusuario()
    {
        $usuario = $this->makeusuario();
        $fakeusuario = $this->fakeusuarioData();
        $updatedusuario = $this->usuarioRepo->update($fakeusuario, $usuario->id);
        $this->assertModelData($fakeusuario, $updatedusuario->toArray());
        $dbusuario = $this->usuarioRepo->find($usuario->id);
        $this->assertModelData($fakeusuario, $dbusuario->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteusuario()
    {
        $usuario = $this->makeusuario();
        $resp = $this->usuarioRepo->delete($usuario->id);
        $this->assertTrue($resp);
        $this->assertNull(usuario::find($usuario->id), 'usuario should not exist in DB');
    }
}
