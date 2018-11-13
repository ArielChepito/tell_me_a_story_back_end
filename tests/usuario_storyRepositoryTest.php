<?php

use App\Models\usuario_story;
use App\Repositories\usuario_storyRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class usuario_storyRepositoryTest extends TestCase
{
    use Makeusuario_storyTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var usuario_storyRepository
     */
    protected $usuarioStoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->usuarioStoryRepo = App::make(usuario_storyRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateusuario_story()
    {
        $usuarioStory = $this->fakeusuario_storyData();
        $createdusuario_story = $this->usuarioStoryRepo->create($usuarioStory);
        $createdusuario_story = $createdusuario_story->toArray();
        $this->assertArrayHasKey('id', $createdusuario_story);
        $this->assertNotNull($createdusuario_story['id'], 'Created usuario_story must have id specified');
        $this->assertNotNull(usuario_story::find($createdusuario_story['id']), 'usuario_story with given id must be in DB');
        $this->assertModelData($usuarioStory, $createdusuario_story);
    }

    /**
     * @test read
     */
    public function testReadusuario_story()
    {
        $usuarioStory = $this->makeusuario_story();
        $dbusuario_story = $this->usuarioStoryRepo->find($usuarioStory->id);
        $dbusuario_story = $dbusuario_story->toArray();
        $this->assertModelData($usuarioStory->toArray(), $dbusuario_story);
    }

    /**
     * @test update
     */
    public function testUpdateusuario_story()
    {
        $usuarioStory = $this->makeusuario_story();
        $fakeusuario_story = $this->fakeusuario_storyData();
        $updatedusuario_story = $this->usuarioStoryRepo->update($fakeusuario_story, $usuarioStory->id);
        $this->assertModelData($fakeusuario_story, $updatedusuario_story->toArray());
        $dbusuario_story = $this->usuarioStoryRepo->find($usuarioStory->id);
        $this->assertModelData($fakeusuario_story, $dbusuario_story->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteusuario_story()
    {
        $usuarioStory = $this->makeusuario_story();
        $resp = $this->usuarioStoryRepo->delete($usuarioStory->id);
        $this->assertTrue($resp);
        $this->assertNull(usuario_story::find($usuarioStory->id), 'usuario_story should not exist in DB');
    }
}
