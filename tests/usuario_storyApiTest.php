<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class usuario_storyApiTest extends TestCase
{
    use Makeusuario_storyTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateusuario_story()
    {
        $usuarioStory = $this->fakeusuario_storyData();
        $this->json('POST', '/api/v1/usuarioStories', $usuarioStory);

        $this->assertApiResponse($usuarioStory);
    }

    /**
     * @test
     */
    public function testReadusuario_story()
    {
        $usuarioStory = $this->makeusuario_story();
        $this->json('GET', '/api/v1/usuarioStories/'.$usuarioStory->id);

        $this->assertApiResponse($usuarioStory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateusuario_story()
    {
        $usuarioStory = $this->makeusuario_story();
        $editedusuario_story = $this->fakeusuario_storyData();

        $this->json('PUT', '/api/v1/usuarioStories/'.$usuarioStory->id, $editedusuario_story);

        $this->assertApiResponse($editedusuario_story);
    }

    /**
     * @test
     */
    public function testDeleteusuario_story()
    {
        $usuarioStory = $this->makeusuario_story();
        $this->json('DELETE', '/api/v1/usuarioStories/'.$usuarioStory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/usuarioStories/'.$usuarioStory->id);

        $this->assertResponseStatus(404);
    }
}
