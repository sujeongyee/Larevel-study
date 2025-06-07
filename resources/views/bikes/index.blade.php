@extends('layout')

@section('content')
<a href="/bikes/create">생성하기</a>
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
  <input type="text" id="searchInput" placeholder="자전거 이름 검색" style="padding: 8px; width: 300px; margin-bottom: 20px;">
  <div id="bikeList"></div>
</div>

<script>
  const token = localStorage.getItem('token');
  fetchBikes();
  
  let input = document.getElementById('searchInput');
  let listEl = document.getElementById('bikeList');

  function fetchBikes(query = '') {
    
    const url = query ? `/api/bikes?search=${encodeURIComponent(query)}` : '/api/bikes';

    fetch(url,{
      headers: {
        'Authorization': `Bearer ${token}`,
      }
    })
    .then(res => {
      if (res.status === 401 || res.redirected) {
        alert("로그인 후 다시 이용해주세요!");
        window.location.href = '/login';
        return;
      }
      return res.json();
    })
    .then(bikes => {
      if (bikes.length === 0) {
        listEl.innerHTML = "<p>검색 결과가 없습니다.</p>";
        return;
      }

      const list = bikes.map(bike => `
        <div>
          <h3><a href="/bikes/${bike.id}">${bike.name}</a></h3>
          <p>-Made by : ${bike.brand}</p>
        </div>
      `).join('');
      listEl.innerHTML = list;
    })
    .catch(() => {
      listEl.innerHTML = "<p>출력할 내용이 없습니다.</p>";
    });
  }

  input.addEventListener('input', () => {
    fetchBikes(input.value);
  });

</script>
@endsection
