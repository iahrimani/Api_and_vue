<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskStoreRequest;
use App\Http\Resources\DeskResource;
use App\Models\Desk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function response;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // https://www.youtube.com/watch?v=ptM2gDsbAFo&list=PLze7bMjv1CYv7JNFtFjs1jqE5bW5WHQDP&index=3
        return DeskResource::collection(Desk::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeskStoreRequest $request)
    {
        // Принимаем всё что приходит с запроса и создаём новую доску
        $created_desk = Desk::create($request->validated());

        // Вертаем только что созданую доску
        return new DeskResource($created_desk);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Desk $desk)
    {
        // https://www.youtube.com/watch?v=ptM2gDsbAFo&list=PLze7bMjv1CYv7JNFtFjs1jqE5bW5WHQDP&index=3
        return new DeskResource($desk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeskStoreRequest $request, Desk $desk)
    {
        // https://www.youtube.com/watch?v=UPXzdXMDDgk&list=PLze7bMjv1CYv7JNFtFjs1jqE5bW5WHQDP&index=5
        $desk->update($request->validated());

        return new DeskResource($desk);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desk $desk)
    {
        $desk->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
