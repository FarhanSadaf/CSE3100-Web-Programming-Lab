<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoRequestController extends Controller
{
    // Request All
    function demo1(Request $request) {
        return $request->all();
    }

    // Request Input
    function demo2(Request $request) {
        $name =  $request->input("name");
        $age = $request->input("age");

        return "Name: $name, Age: $age";
    }

    // Request Input with Default Value
    function demo3(Request $request) {
        $name =  $request->input("name", "John Doe");
        $age = $request->input("age", 20);

        return "Name: $name, Age: $age";
    }

    // Request Header
    function demo4(Request $request) {
        $header = $request->header("Web-App");
        return $header;
    }

    // Request Query
    function demo5(Request $request) {
        $name =  $request->query("name");
        $age = $request->query("age");

        return "Name: $name, Age: $age";
    }

    // Request Query with Default Value
    function demo6(Request $request) {
        $name =  $request->query("name", "John Doe");
        $age = $request->query("age", 20);

        return "Name: $name, Age: $age";
    }

    // Request Cookies
    function demo7(Request $request) {
        $cookie = $request->cookie("Web-App");
        return $cookie;
    }

}
