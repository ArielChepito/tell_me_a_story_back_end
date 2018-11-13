<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createusuario_storyAPIRequest;
use App\Http\Requests\API\Updateusuario_storyAPIRequest;
use App\Models\usuario_story;
use App\Repositories\usuario_storyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class usuario_storyController
 * @package App\Http\Controllers\API
 */

class usuario_storyAPIController extends AppBaseController
{
    /** @var  usuario_storyRepository */
    private $usuarioStoryRepository;

    public function __construct(usuario_storyRepository $usuarioStoryRepo)
    {
        $this->usuarioStoryRepository = $usuarioStoryRepo;
    }

    /**
     * Display a listing of the usuario_story.
     * GET|HEAD /usuarioStories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usuarioStoryRepository->pushCriteria(new RequestCriteria($request));
        $this->usuarioStoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $usuarioStories = $this->usuarioStoryRepository->all();

        return $this->sendResponse($usuarioStories->toArray(), 'Usuario Stories retrieved successfully');
    }

    /**
     * Store a newly created usuario_story in storage.
     * POST /usuarioStories
     *
     * @param Createusuario_storyAPIRequest $request
     *
     * @return Response
     */
    public function store(Createusuario_storyAPIRequest $request)
    {
        $input = $request->all();

        $usuarioStories = $this->usuarioStoryRepository->create($input);

        return $this->sendResponse($usuarioStories->toArray(), 'Usuario Story saved successfully');
    }

    /**
     * Display the specified usuario_story.
     * GET|HEAD /usuarioStories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var usuario_story $usuarioStory */
        $usuarioStory = $this->usuarioStoryRepository->findWithoutFail($id);

        if (empty($usuarioStory)) {
            return $this->sendError('Usuario Story not found');
        }

        return $this->sendResponse($usuarioStory->toArray(), 'Usuario Story retrieved successfully');
    }

    /**
     * Update the specified usuario_story in storage.
     * PUT/PATCH /usuarioStories/{id}
     *
     * @param  int $id
     * @param Updateusuario_storyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updateusuario_storyAPIRequest $request)
    {
        $input = $request->all();

        /** @var usuario_story $usuarioStory */
        $usuarioStory = $this->usuarioStoryRepository->findWithoutFail($id);

        if (empty($usuarioStory)) {
            return $this->sendError('Usuario Story not found');
        }

        $usuarioStory = $this->usuarioStoryRepository->update($input, $id);

        return $this->sendResponse($usuarioStory->toArray(), 'usuario_story updated successfully');
    }

    /**
     * Remove the specified usuario_story from storage.
     * DELETE /usuarioStories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var usuario_story $usuarioStory */
        $usuarioStory = $this->usuarioStoryRepository->findWithoutFail($id);

        if (empty($usuarioStory)) {
            return $this->sendError('Usuario Story not found');
        }

        $usuarioStory->delete();

        return $this->sendResponse($id, 'Usuario Story deleted successfully');
    }
}
