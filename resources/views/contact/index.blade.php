@extends('layouts.app')

@section("content")
    <h1>Contact us</h1>
    <form action="/contact" method="post">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name='name'>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name='email'>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class='form-control'></textarea>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="submit" value="Submit" class='btn btn-success'>
    </form>

@endsection