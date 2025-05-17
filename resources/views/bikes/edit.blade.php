@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
  <form id="editForm" class="form bg-white p-6 border-1">
    @csrf
    <input type="hidden" id="bike-id" value="{{$bike['id']}}">
    <div>
      <label class="text-sm" for="bike-name">Bike name</label>
      <input class="text-lg border-1" type="text" id="bike-name" name="bike-name" value="{{$bike['name']}}">
      <p class="error" id="error-name"></p>
    </div>
    <div>
      <label class="text-sm" for="bike-price">Bike price</label>
      <input class="text-lg border-1" type="text" id="bike-price" name="bike-price" value="{{$bike['price']}}">
      <p class="error" id="error-price"></p>
    </div>
    <div>
      <label class="text-sm" for="bike-brand">Bike Brand</label>
      <input class="text-lg border-1" type="text" id="bike-brand" name="bike-brand" value="{{$bike['brand']}}">
      <p class="error" id="error-brand"></p>
    </div>
    <div>
      <button class="border-1" type="button" onclick="updateForm()">Submit</button>
    </div>
  </form>
</div>

<script>
  
  function updateForm () {

    const id = document.getElementById('bike-id').value;

    const data = {
      'bike-name': document.getElementById('bike-name').value,
      'bike-price': document.getElementById('bike-price').value,
      'bike-brand': document.getElementById('bike-brand').value
    };

    fetch(`/api/bikes/${id}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(res => {
      if (res.result === 'success') {
        alert('상품 수정에 성공했습니다!');
        location.href = `/bikes/${id}`;
      } else if (res.result === 'error'){
        alert(`상품 수정에 실패했습니다! 사유 : ${res.message}`);
        // console.log(res);
      }
    })
    .catch(err => {
      alert('에러 발생!');
      console.error(err);
    });

  }
</script>
@endsection
