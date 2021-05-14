<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Resources\ClientResource;
use App\Http\Resources\ClientCollection;
use App\Http\Requests\ClientStoreRequest;
use App\Http\Requests\ClientUpdateRequest;

class ClientController extends Controller
{
    /**
     * @OA\Get(
     *      tags={"/clients"},
     *      summary="Display list of resources",
     *      description="get all clients on the database and paginate them",
     *      path="/clients",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="limit per page",
     *          @OA\Schema(type="int"),
     *          style="form"
     *      ),
     *      @OA\Response(
     *          response="200", description="List of clients"
     *      )
     *  )
     * @return ClientCollection
     */
    public function index(Request $request)
    {
        return new ClientCollection(Client::paginate($request->limit ?? null));
    }

    // public function store(ClientStoreRequest $request)
    // {
    //     return Client::create($request->validated());
    // }

    /**
     * @OA\Get(
     *      tags={"/clients"},
     *      summary="Display the expecified resources",
     *      description="show client",
     *      path="/clients/{client}",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="client",
     *          in="path",
     *          description="Client ID",
     *          required=true,
     *          @OA\Schema(type="int", format="int64"),
     *      ),
     *      @OA\Response(
     *          response="200", description="Show Client"
     *      )
     *  )
     * @return ClientResource
     */
    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    /**
     * @OA\Put(
     *      tags={"/clients"},
     *      summary="Update the expecified resources",
     *      description="Update client on database",
     *      path="/clients/{client}",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="client",
     *          in="path",
     *          description="Client ID",
     *          required=true,
     *          @OA\Schema(type="int", format="int64"),
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="document", type="string"),
     *              @OA\Property(property="document_type", type="string"),
     *              @OA\Property(property="full_name", type="string"),
     *              @OA\Property(property="phone", type="string"),
     *              @OA\Property(property="user_id", type="string")
     *          ),
     *      ),
     *      @OA\Response(
     *          response="200", description="Client Updated"
     *      )
     *  )
     * @return \Illuminate\Http\Response
     */
    public function update(ClientUpdateRequest $request, Client $client)
    {
        return $client->update($request->validated());
    }

    /**
     * @OA\Delete(
     *      tags={"/clients"},
     *      summary="Display the expecified resources",
     *      description="show client",
     *      path="/clients/{client}",
     *      security={{"bearerAuth": {}}},
     *      @OA\Parameter(
     *          name="client",
     *          in="path",
     *          description="Client ID",
     *          required=true,
     *          @OA\Schema(type="int", format="int64"),
     *      ),
     *      @OA\Response(
     *          response="204", description="Client Deleted"
     *      )
     *  )
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(null, 204);
    }
}
