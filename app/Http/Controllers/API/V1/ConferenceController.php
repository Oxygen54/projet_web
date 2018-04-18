<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Transformers\ConferenceTransformer;
use App\Models\Conference;
use Dingo\Api\Contract\Http\Request;
use Dingo\Api\Http\Response;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;

class ConferenceController extends Controller
{
    use Helpers;

    public function index(Request $request) : Response
    {
        return $this->response->collection(Conference::all(), new ConferenceTransformer);
    }
}