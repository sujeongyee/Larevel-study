@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
  <div id="bikeDetail"></div>
  <div>
    <a id="editLink"><button>수정하기</button></a>
    <form id="deleteForm">
        @csrf
        <input type="hidden" id="bike-id" value="">
        <button type="button" onclick="deleteForm()">삭제하기</button>
    </form>
  </div>
</div>

<script>
  const id = window.location.pathname.split("/").pop();
  const detailEl = document.getElementById("bikeDetail");
  const idField = document.getElementById("bike-id");
  const editLink = document.getElementById("editLink");
  const token = localStorage.getItem('token');
  fetch(`/api/bikes/${id}`,{
    method: 'GET',
    headers: {
      'Authorization': `Bearer ${token}`,
      'Accept': 'application/json'
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
  .then(bike => {
    detailEl.innerHTML = `
      <h3>${bike.name}</h3>
      <h4>${bike.brand}</h4>
      <h4>${bike.price}</h4>
    `;
    idField.value = bike.id;
    editLink.href = `/bikes/${bike.id}/edit`;
  })
  .catch(err => {
    detailEl.innerHTML = `<p>데이터를 불러오지 못했습니다.</p>`;
  });

  function deleteForm () {
    if (confirm('삭제하시겠습니까?')) {
      fetch(`/api/bikes/${id}`, {
        method: 'DELETE',
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
      .then(() => {
        alert('상품 삭제 완료');
        location.href = '/bikes';
      })
      .catch(() => {
        alert('상품 삭제 실패');
      });
    }
  }
</script>
@endsection
