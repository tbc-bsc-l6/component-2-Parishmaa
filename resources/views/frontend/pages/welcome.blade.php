@extends('layouts.app')

@section('content')
    <title>Welcome to our Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            /* position: relative; */
            width: 100%
        }

        .header {
            background-color: #ffdfdf;
            color: #ee00ff;
            padding: 20px;
            text-align: center;
        }

        .content-wrapper {
            padding-bottom: 50px;
        }

        
    </style>
    </head>

    <body>
        <!-- Header section -->
        <div class="header">
            <h1>Welcome to our Website</h1>
        </div>

        <!-- Main content section -->
        <div class="content-wrapper">
            @include('frontend.components.homeProducts', ['products' => $products])
        </div>

        <div class="content-wrapper">
            @include('frontend.components.homeDeals' , ['deals' => $deals] )
        </div> */
    </body>

    </html>
@endsection
