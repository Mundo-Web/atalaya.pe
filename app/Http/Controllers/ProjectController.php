<?php

namespace App\Http\Controllers;

use App\Http\Classes\dxResponse;
use App\Models\dxDataGrid;
use App\Models\Project;
use App\Models\ProjectView;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use SoDe\Extend\JSON;
use SoDe\Extend\Response;

class ProjectController extends Controller
{
    public function paginate(Request $request): HttpResponse|ResponseFactory
    {
        $response =  new dxResponse();
        try {
            $instance = ProjectView::select();

            if ($request->group != null) {
                [$grouping] = $request->group;
                $selector = \str_replace('.', '__', $grouping['selector']);
                $instance = ProjectView::select([
                    "{$selector} AS key"
                ])
                    ->groupBy($selector);
            }

            if (!Auth::user()->can('projects.root')) {
                $instance->whereNotNull('status');
            }
            if (!Auth::user()->can('clients.root')) {
                $instance->whereNotNull('client__status');
            }
            if ($request->filter) {
                $instance->where(function ($query) use ($request) {
                    dxDataGrid::filter($query, $request->filter ?? []);
                });
            }

            if ($request->sort != null) {
                foreach ($request->sort as $sorting) {
                    $selector = \str_replace('.', '__', $sorting['selector']);
                    $instance->orderBy(
                        $selector,
                        $sorting['desc'] ? 'DESC' : 'ASC'
                    );
                }
            } else {
                $instance->orderBy('id', 'DESC');
            }

            $totalCount = 0;
            if ($request->requireTotalCount) {
                $totalCount = $instance->count('*');
            }

            $jpas = [];
            if (!$request->ignoreData) {
                $jpas = $request->isLoadingAll
                    ? $instance->get()
                    : $instance
                    ->skip($request->skip ?? 0)
                    ->take($request->take ?? 10)
                    ->get();
            }

            $results = [];

            foreach ($jpas as $jpa) {
                $result = JSON::unflatten($jpa->toArray(), '__');
                $results[] = $result;
            }

            $response->status = 200;
            $response->message = 'Operación correcta';
            $response->data = $results;
            $response->totalCount = $totalCount;
        } catch (\Throwable $th) {
            $response->status = 400;
            $response->message = $th->getMessage() . " " . $th->getFile() . ' Ln.' . $th->getLine();
        } finally {
            return response(
                $response->toArray(),
                $response->status
            );
        }
    }

    public function save(Request $request): HttpResponse|ResponseFactory
    {
        $response = new Response();
        try {

            $body = $request->all();

            $jpa = Project::find($request->id);
            if (!$jpa) {
                Project::create($body);
            } else {
                $jpa->update($body);
            }

            $response->status = 200;
            $response->message = 'Operacion correcta';
        } catch (\Throwable $th) {
            $response->status = 400;
            $response->message = $th->getMessage();
        } finally {
            return response(
                $response->toArray(),
                $response->status
            );
        }
    }

    static function status(Request $request)
    {
        $response = new Response();
        try {
            Project::where('id', $request->id)
                ->update([
                    'status' => $request->status ? 0 : 1
                ]);

            $response->status = 200;
            $response->message = 'Operacion correcta';
        } catch (\Throwable $th) {
            $response->status = 400;
            $response->message = $th->getMessage();
        } finally {
            return response(
                $response->toArray(),
                $response->status
            );
        }
    }

    static function projectStatus(Request $request)
    {
        $response = new Response();
        try {
            Project::where('id', $request->project)
                ->update([
                    'status_id' => $request->status
                ]);

            $response->status = 200;
            $response->message = 'Operacion correcta';
        } catch (\Throwable $th) {
            $response->status = 400;
            $response->message = $th->getMessage();
        } finally {
            return response(
                $response->toArray(),
                $response->status
            );
        }
    }

    static function delete(Request $request, string $id)
    {
        $response = new Response();
        try {
            $deleted = Project::where('id', $id)
                ->update(['status' => null]);

            if (!$deleted) throw new Exception('No se ha eliminado ningun registro');

            $response->status = 200;
            $response->message = 'Operacion correcta';
        } catch (\Throwable $th) {
            $response->status = 400;
            $response->message = $th->getMessage();
        } finally {
            return response(
                $response->toArray(),
                $response->status
            );
        }
    }
}
