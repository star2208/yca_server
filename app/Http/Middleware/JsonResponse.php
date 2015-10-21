<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse as HttpJsonResponse;
use Illuminate\Contracts\Support\Arrayable;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Http\Response;
use Carbon\Carbon;

class JsonResponse
{

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$response = $next($request);

		// 忽略对已经是JSON响应的处理。
		if ($response instanceof HttpJsonResponse) {
			return $response;
		}

		// 忽略对二进制响应的处理。
		if ($response instanceof BinaryFileResponse) {
			return $response;
		}

		// 忽略对重定向响应的处理。
		if ($response instanceof RedirectResponse) {
			return $response;
		}

		// 对数NULL类型进行处理。
		$recstr = null;
        $recstr = function ($data) use(&$recstr)
        {
            if ($data instanceof Arrayable) {
                $data = $data->toArray();
            }
            if (is_array($data)) {
                return array_map($recstr, $data);
            } elseif (is_null($data)) {
                return (object) null;
            } elseif ($data instanceof Carbon) {
                return (string) $data;
            }
            return $data;
        };

		// JSON封装。
		$data = [
			'status' => 200,
			'message' => '',
			'data' => null
		];
		if ($response instanceof Response) {
			$data['status'] = $response->getStatusCode();
			if ($data['status'] === 200) {
				$data['data'] = $response->getContent();
			} else {
				$data['message'] = $response->getContent();
			}
		} else {
			$data['data'] = $response;
		}
		return response()->json($recstr($data));
	}
}
