<?php

use Faker\Factory as Faker;
use App\Models\usuario_story;
use App\Repositories\usuario_storyRepository;

trait Makeusuario_storyTrait
{
    /**
     * Create fake instance of usuario_story and save it in database
     *
     * @param array $usuarioStoryFields
     * @return usuario_story
     */
    public function makeusuario_story($usuarioStoryFields = [])
    {
        /** @var usuario_storyRepository $usuarioStoryRepo */
        $usuarioStoryRepo = App::make(usuario_storyRepository::class);
        $theme = $this->fakeusuario_storyData($usuarioStoryFields);
        return $usuarioStoryRepo->create($theme);
    }

    /**
     * Get fake instance of usuario_story
     *
     * @param array $usuarioStoryFields
     * @return usuario_story
     */
    public function fakeusuario_story($usuarioStoryFields = [])
    {
        return new usuario_story($this->fakeusuario_storyData($usuarioStoryFields));
    }

    /**
     * Get fake data of usuario_story
     *
     * @param array $postFields
     * @return array
     */
    public function fakeusuario_storyData($usuarioStoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_usuario' => $fake->word,
            'id_story' => $fake->randomDigitNotNull,
            'comentario' => $fake->word,
            'state' => $fake->randomDigitNotNull
        ], $usuarioStoryFields);
    }
}
