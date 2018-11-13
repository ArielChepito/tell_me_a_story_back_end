<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createusuario_storyRequest;
use App\Http\Requests\Updateusuario_storyRequest;
use App\Repositories\usuario_storyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class usuario_storyController extends AppBaseController
{
    /** @var  usuario_storyRepository */
    private $usuarioStoryRepository;

    public function __construct(usuario_storyRepository $usuarioStoryRepo)
    {
        $this->usuarioStoryRepository = $usuarioStoryRepo;
    }

    /**
     * Display a listing of the usuario_story.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usuarioStoryRepository->pushCriteria(new RequestCriteria($request));
        $usuarioStories = $this->usuarioStoryRepository->all();

        return view('usuario_stories.index')
            ->with('usuarioStories', $usuarioStories);
    }

    /**
     * Show the form for creating a new usuario_story.
     *
     * @return Response
     */
    public function create()
    {
        return view('usuario_stories.create');
    }

    /**
     * Store a newly created usuario_story in storage.
     *
     * @param Createusuario_storyRequest $request
     *
     * @return Response
     */
    public function store(Createusuario_storyRequest $request)
    {
        $input = $request->all();

        $usuarioStory = $this->usuarioStoryRepository->create($input);

        Flash::success('Usuario Story saved successfully.');

        return redirect(route('usuarioStories.index'));
    }

    /**
     * Display the specified usuario_story.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usuarioStory = $this->usuarioStoryRepository->findWithoutFail($id);

        if (empty($usuarioStory)) {
            Flash::error('Usuario Story not found');

            return redirect(route('usuarioStories.index'));
        }

        return view('usuario_stories.show')->with('usuarioStory', $usuarioStory);
    }

    /**
     * Show the form for editing the specified usuario_story.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usuarioStory = $this->usuarioStoryRepository->findWithoutFail($id);

        if (empty($usuarioStory)) {
            Flash::error('Usuario Story not found');

            return redirect(route('usuarioStories.index'));
        }

        return view('usuario_stories.edit')->with('usuarioStory', $usuarioStory);
    }

    /**
     * Update the specified usuario_story in storage.
     *
     * @param  int              $id
     * @param Updateusuario_storyRequest $request
     *
     * @return Response
     */
    public function update($id, Updateusuario_storyRequest $request)
    {
        $usuarioStory = $this->usuarioStoryRepository->findWithoutFail($id);

        if (empty($usuarioStory)) {
            Flash::error('Usuario Story not found');

            return redirect(route('usuarioStories.index'));
        }

        $usuarioStory = $this->usuarioStoryRepository->update($request->all(), $id);

        Flash::success('Usuario Story updated successfully.');

        return redirect(route('usuarioStories.index'));
    }

    /**
     * Remove the specified usuario_story from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usuarioStory = $this->usuarioStoryRepository->findWithoutFail($id);

        if (empty($usuarioStory)) {
            Flash::error('Usuario Story not found');

            return redirect(route('usuarioStories.index'));
        }

        $this->usuarioStoryRepository->delete($id);

        Flash::success('Usuario Story deleted successfully.');

        return redirect(route('usuarioStories.index'));
    }
}
