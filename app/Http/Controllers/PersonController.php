<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use SoDe\Extend\Response;

class PersonController extends Controller
{
    public function search(Request $request, string $documentType, string $documentNumber)
    {
        $response = Response::simpleTryCatch(function () use ($documentType, $documentNumber) {
            $person = Person::where('document_type', $documentType)
                ->where('document_number', $documentNumber)
                ->first();

            if (!$person) throw new \Exception('Persona no encontrada', 404);
            return $person;
        });
        return response($response->toArray(), $response->status);
    }
}
