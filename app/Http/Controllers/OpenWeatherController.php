<?php

namespace App\Http\Controllers;

use App\Events\UserSignedUp;
use App\Http\Requests\SearchWeatherRequest;
use App\Http\Resources\LoggedInUserResource;
use App\Services\WeatherService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response;
use OpenApi\Attributes as OAT;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OpenWeatherController extends Controller
{
    public function __construct(private WeatherService $weatherService)
    {
        //
    }

    #[OAT\Post(
        tags: ['open-weather'],
        path: '/api/open-weather',
        operationId: 'OpenWeatherController.search',
        requestBody: new OAT\RequestBody(
            required: true,
            content: new OAT\JsonContent(ref: '#/components/schemas/SearchWeatherRequest')

        ),
        responses: [
            new OAT\Response(
                response: HttpResponse::HTTP_OK,
                description: 'Ok',
                content: new OAT\JsonContent(ref: '#/components/schemas/SearchWeatherResource')
            ),
            new OAT\Response(
                response: HttpResponse::HTTP_UNPROCESSABLE_ENTITY,
                description: 'Unprocessable entity',
                content: new OAT\JsonContent(ref: '#/components/schemas/ValidationError')
            ),
        ]
    )]
    public function search(SearchWeatherRequest $request): JsonResponse
    {
        $w = $this->weatherService->find($request);
        return Response::json($w);
    }

    

    // #[OAT\Post(
    //     tags: ['open-weather'],
    //     path: '/api/open-weather-list',
    //     operationId: 'OpenWeatherController.search',
    //     requestBody: new OAT\RequestBody(
    //         required: true,
    //         content: new OAT\JsonContent(ref: '#/components/schemas/SearchMultipleWeatherRequest')

    //     ),
    //     responses: [
    //         new OAT\Response(
    //             response: HttpResponse::HTTP_OK,
    //             description: 'Ok',
    //             content: new OAT\JsonContent(ref: '#/components/schemas/LoggedInUserResource')
    //         ),
    //         new OAT\Response(
    //             response: HttpResponse::HTTP_UNPROCESSABLE_ENTITY,
    //             description: 'Unprocessable entity',
    //             content: new OAT\JsonContent(ref: '#/components/schemas/ValidationError')
    //         ),
    //     ]
    // )]
    // public function searchMultiple(SignupRequest $request): JsonResponse
    // {
    //     $weather_list = $this->weatherService->findMultiple($request);
    //     return Response::json(new LoggedInUserResource($weather_list), HttpResponse::HTTP_CREATED);
    // }

}
