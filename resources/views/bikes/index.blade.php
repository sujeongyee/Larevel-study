@extends('layout')

@section('content')
<a href="/bikes/create">생성하기</a>
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
  <div id="bikeList"></div>
</div>

<script>
  fetch('/api/bikes')
  .then(res => res.json())
  .then(bikes => {
    const list = bikes.map(bike => `
      <div>
        <h3><a href="/bikes/${bike.id}">${bike.name}</a></h3>
        <p>-Made by : ${bike.brand}</p>
      </div>
    `).join('');
    document.getElementById('bikeList').innerHTML = list;
  })
  .catch(() => {
    document.getElementById('bikeList').innerHTML = "<p>출력할 내용이 없습니다.</p>";
  });
</script>
@endsection
