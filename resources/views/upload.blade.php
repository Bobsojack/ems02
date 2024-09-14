@extends('layouts.Adminapp')
@section('content')

  
    <style>
    
        .container {
            margin-top:90px;
            background: #fff;
            padding: 20px 30px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #5a5a5a;
        }
        input[type="file"] {
            padding: 10px;
            margin: 20px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #5a67d8;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #434190;
        }
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            color: white;
            background-color: #48bb78;
            border-radius: 4px;
        }
    </style>


    <div class="container">
        <h1>Import Equipment</h1>

        @if(session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <form action="{{ route('equipment.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" required>
            <button type="submit">Import</button>
        </form>
    </div>

@endsection

