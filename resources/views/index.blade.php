@extends('layouts.default')

@section('content')
  
  <div class="todo_form">
    <h3>Submit the Todo App</h3>
    <form action="{{ url('/todo') }}" method="POST" class="form-inline">
      {{-- cross site reference --}}
      @csrf
      <div class="form-group mr-2">
        <input type="text" name="title" class="form-control rounded"> 
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      @error('title')
        <span class="text-danger">Please enter a value</span>
      @enderror
    </form>

  </div>

  <div class="results">
    @foreach( $todos as $todo )
      <div class="bg-white rounded mt-3 mb-3 p-3 shadow flex">
        <div class="result_title">
          {{ $todo->title }}
        </div>
        <form class="form-inline" action={{ route('todo.delete', $todo) }} method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn">Delete</button>

        </form>

      </div>
    @endforeach
    
    
  </div>
@endsection