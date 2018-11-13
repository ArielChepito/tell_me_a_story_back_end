<?php

use Faker\Factory as Faker;
use App\Models\usuario;
use App\Repositories\usuarioRepository;

trait MakeusuarioTrait
{
    /**
     * Create fake instance of usuario and save it in database
     *
     * @param array $usuarioFields
     * @return usuario
     */
    public function makeusuario($usuarioFields = [])
    {
        /** @var usuarioRepository $usuarioRepo */
        $usuarioRepo = App::make(usuarioRepository::class);
        $theme = $this->fakeusuarioData($usuarioFields);
        return $usuarioRepo->create($theme);
    }

    /**
     * Get fake instance of usuario
     *
     * @param array $usuarioFields
     * @return usuario
     */
    public function fakeusuario($usuarioFields = [])
    {
        return new usuario($this->fakeusuarioData($usuarioFields));
    }

    /**
     * Get fake data of usuario
     *
     * @param array $postFields
     * @return array
     */
    public function fakeusuarioData($usuarioFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'first_name' => $fake->word,
            'last_name' => $fake->word,
            'email' => $fake->word,
            'file' => $fake->word
        ], $usuarioFields);
    }
}
