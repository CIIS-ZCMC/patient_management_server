<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;

class Validate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve token from Authorization header
        $token = $request->bearerToken();

        // Retrieve domain and IP address
        $domain = $request->getHost();
        $ip = $request->ip();

        // Retrieve user data
        $user = $request->user();

        // Prepare the request body
        $data = [
            'token' => $token,
            'domain' => $domain,
            'ip' => $ip,
            'user' => $user,
        ];

        // Make a request to the user management server
        $client = new Client();
        $response = $client->post('https://user-management-server/api/validate', [
            'json' => $data,
        ]);

        // Check the response for success or failure
        if ($response->getStatusCode() !== 200) {
            // Return the response from the user management server
            return $response;
        }

        return $next($request);
    }
}
