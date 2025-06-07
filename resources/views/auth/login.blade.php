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
      <button class="border-1" type="button" onclick="submitForm()">로그인</button>
    </div>
  </form>
</div>

@endsection
<script>
  function submitForm() {
    const data = {
      id: parseInt(document.getElementById('id').value),
      password: document.getElementById('password').value
    };

    fetch('/sanctum/csrf-cookie').then(() => {
      fetch('/api/login', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json'
        },
        body: JSON.stringify(data)
      })
      .then(res => res.json())
      .then(data => {
        if (data.result === 'success') {
          localStorage.setItem('token', data.token);
          alert('로그인 성공');
          window.location.href = '/bikes'; 
        } else {
          alert(data.message || '로그인 실패');
        }
      });
    });
  }
</script>