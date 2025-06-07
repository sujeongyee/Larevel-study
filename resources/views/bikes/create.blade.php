@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
  <form id="createForm" class="form bg-white p-6 border-1">
    @csrf
    <div>
      <label class="text-sm" for="bike-name">Bike name</label>
      <input class="text-lg border-1" type="text" id="bike-name" name="bike-name">
      <p class="error" id="error-name"></p>
    </div>
    <div>
      <label class="text-sm" for="bike-price">Bike price</label>
      <input class="text-lg border-1" type="text" id="bike-price" name="bike-price">
      <p class="error" id="error-price"></p>
    </div>
    <div>
      <label class="text-sm" for="bike-brand">Bike Brand</label>
      <input class="text-lg border-1" type="text" id="bike-brand" name="bike-brand">
      <p class="error" id="error-brand"></p>
    </div>
    <div>
      <button class="border-1" type="button" onclick="submitForm()">Submit</button>
    </div>
  </form>
</div>

<script>
  function submitForm () {
    const data = {
      'bike-name': document.getElementById('bike-name').value,
      'bike-price': document.getElementById('bike-price').value,
      'bike-brand': document.getElementById('bike-brand').value
    };
    const token = localStorage.getItem('token');
    fetch('/api/bikes', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Bearer ${token}`,
      },
      body: JSON.stringify(data)
    })
    .then(res => {
      if (res.status === 401 || res.redirected) {
        alert("로그인 후 다시 이용해주세요!");
        window.location.href = '/login';
        return;
      }
      return res.json();
    })
    .then(res => {
      console.log(res);
      if (res.reuslt === 'success') {
        alert('상품 등록에 성공했습니다!');
        location.href = '/bikes';
      } else {
        alert('상품 등록에 실패했습니다!');
      }
    })
    .catch(err => {
      alert('에러 발생!');
      console.error(err);
    });
  }

</script>
@endsection
