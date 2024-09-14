@extends('layouts.Adminapp')

@section('content')
<style>
    .profile-container {
        margin-top: 200px; /* Adjusted margin for better spacing */
        padding: 20px; /* Added padding for inner spacing */
        border: 1px solid rgb(0, 0, 0); /* Changed to solid border for better visibility */
        border-radius: 10px; /* Optional: Rounded corners */
        background-color: #f9f9f9; /* Optional: Background color */
    }
    .form-group {
        margin-bottom: 15px; /* Added margin for spacing between form elements */
    }
    .btn-primary {
        background-color: #007bff; /* Bootstrap primary button color */
        border: none; /* Remove border */
        color: white; /* White text color */
        padding: 10px 20px; /* Adjusted padding */
        border-radius: 5px; /* Rounded corners for button */
        cursor: pointer; /* Pointer cursor on hover */
    }
    .btn-primary:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }
</style>

<div class="profile-container">
    <h2>Upload Profile Image</h2>
    <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="profile_image">Profile Image:</label>
            <input type="file" name="profile_image" id="profile_image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection

