<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DemoResponseController extends Controller
{
    // String, Integer, Bool, Null Responses
    function demo1(): string | int | bool | null {
        // return "Hello World";
        return true;
    }

    // Array and Associtive array Response
    function demo2(): array {
        // $names = ["John Doe", "Jane Doe", "John Smith"];
        // return $names;
        
        $persons = [
            ["name" => "John Doe", "age" => 20],
            ["name" => "Jane Doe", "age" => 21],
            ["name" => "John Smith", "age" => 22],
        ];
        
        return $persons;
    }

    // JSON Response
    function demo3(): JsonResponse {
        $persons = [
            ["name" => "John Doe", "age" => 20],
            ["name" => "Jane Doe", "age" => 21],
            ["name" => "John Smith", "age" => 22],
        ];

        return response()->json($persons);
    }

    // JSON Response with Status Code
    function demo4() {
        $persons = [
            ["name" => "John Doe", "age" => 20],
            ["name" => "Jane Doe", "age" => 21],
            ["name" => "John Smith", "age" => 22],
        ];

        // Mostly used status codes which Laravel manages: 200, 201, 202, 204, 400, 401, 403, 404, 500, 415, 305
        return response()->json(["status" => "succees", "data" => $persons], 201);

        // 401 - Unauthorized (Manage manually) - When user is not logged in
    }

    // Response Redirect
    function demo5() {
        // return redirect("https://www.google.com");
        return redirect("api/res/demo4");
    }

    // Binary File Response
    function demo6(): BinaryFileResponse {
        return response()->file("images/mountain.jpg");
    }

    // File Download Response
    function demo7(): BinaryFileResponse {
        return response()->download("images/mountain.jpg");
    }

    // Cookie Response
    function demo8() {
        $name = "Web-Lab-Cookie";
        $value = "CSE 2K20 Lab 10";
        $expires = 60; // minutes
        $path = "/";
        $domain = $_SERVER["SERVER_NAME"];
        $secure = false;
        $httponly = true;
        return response("Cookie set successfully.")->cookie($name, $value, $expires, $path, $domain, $secure, $httponly);
    }

    // Response with Header (Custom Header)
    function demo9() {
        return response("Header set successfully.")
        ->header("WebLab1", "WebLab1-value")
        ->header("WebLab2", "WebLab2-value")
        ->header("WebLab3", "WebLab3-value");
    }
}
