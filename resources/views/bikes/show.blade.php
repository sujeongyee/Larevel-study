@extends('layout')

@section('content')

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
  <!-- {{print_r($bike)}} -->
   <div>
    <h3>{{$bike['name']}}</h3>
    <h4>{{$bike['brand']}}</h4>
    <h4>{{$bike['price']}}</h4>
    <a href="/bikes/{{$bike['id']}}/edit">
      <button>수정하기</button>
    </a>
    <form action="{{ route('bikes.destroy', ['bike'=> $bike['id']]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('삭제하시겠습니까?')">삭제하기</button>
    </form>
   </div>
</div>

@endsection
