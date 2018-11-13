<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateusuarioAPIRequest;
use App\Http\Requests\API\UpdateusuarioAPIRequest;
use App\Models\usuario;
use App\Repositories\usuarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class usuarioController
 * @package App\Http\Controllers\API
 */

class usuarioAPIController extends AppBaseController
{
    /** @var  usuarioRepository */
    private $usuarioRepository;

    public function __construct(usuarioRepository $usuarioRepo)
    {
        $this->usuarioRepository = $usuarioRepo;
    }

    /**
     * Display a listing of the usuario.
     * GET|HEAD /usuarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->usuarioRepository->pushCriteria(new RequestCriteria($request));
        $this->usuarioRepository->pushCriteria(new LimitOffsetCriteria($request));
        $usuarios = $this->usuarioRepository->all();

        return $this->sendResponse($usuarios->toArray(), 'Usuarios retrieved successfully');
    }

    /**
     * Store a newly created usuario in storage.
     * POST /usuarios
     *
     * @param CreateusuarioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateusuarioAPIRequest $request)
    {
        $input = $request->all();

        $usuarios = $this->usuarioRepository->create($input);

        return $this->sendResponse($usuarios->toArray(), 'Usuario saved successfully');
    }

    /**
     * Display the specified usuario.
     * GET|HEAD /usuarios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var usuario $usuario */
        $usuario = $this->usuarioRepository->findWithoutFail($id);

        if (empty($usuario)) {
            return $this->sendError('Usuario not found');
        }

        return $this->sendResponse($usuario->toArray(), 'Usuario retrieved successfully');
    }

    /**
     * Update the specified usuario in storage.
     * PUT/PATCH /usuarios/{id}
     *
     * @param  int $id
     * @param UpdateusuarioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateusuarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var usuario $usuario */
        $usuario = $this->usuarioRepository->findWithoutFail($id);

        if (empty($usuario)) {
            return $this->sendError('Usuario not found');
        }

        $usuario = $this->usuarioRepository->update($input, $id);

        return $this->sendResponse($usuario->toArray(), 'usuario updated successfully');
    }

    /**
     * Remove the specified usuario from storage.
     * DELETE /usuarios/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var usuario $usuario */
        $usuario = $this->usuarioRepository->findWithoutFail($id);

        if (empty($usuario)) {
            return $this->sendError('Usuario not found');
        }

        $usuario->delete();

        return $this->sendResponse($id, 'Usuario deleted successfully');
    }
}
