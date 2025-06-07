@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
  <form id="loginForm" class="form bg-white p-6 border-1">
    @csrf
    <div>
      <label class="text-sm" for="id">아이디</label>
      <input class="text-lg border-1" type="text" id="id" name="id" required value="{{ old('id') }}">
    </div>
    <div>
      <label class="text-sm" for="password">비밀번호</label>
      <input class="text-lg border-1" type="text" id="password" name="password">
    </div>
    <div>
      <label class="text-sm" for="name">이름</label>
      <input class="text-lg border-1" type="text" id="name" name="name" required value="{{ old('name') }}">
    </div>
    <div>
      <button class="border-1" type="button" onclick="submitForm()">회원가입</button>
    </div>
  </form>
</div>

@endsection
<script>
  function submitForm() {
    const formData = {
      id: document.getElementById('id').value,
      password: document.getElementById('password').value,
      name: document.getElementById('name').value,
    };
    try {
      fetch('/api/register', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData)
      })
      .then(res => res.json())
      .then(data => {
        alert('회원가입 성공!');
        console.log(data);
      })
      .catch(error => {
        console.error('에러 발생:', error);
        alert(error.message || '회원가입 실패');
      });
    } catch (error) {
      console.error(error);
      alert('서버 오류');
    }
  }
</script>