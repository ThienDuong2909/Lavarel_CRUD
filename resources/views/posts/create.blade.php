@extends('layouts.app')

@section('content')
    <h2>📝 Tạo bài viết mới</h2>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nội dung</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">⬅️ Quay lại</a>
        <button type="submit" class="btn btn-primary">💾 Lưu</button>
    </form>
@endsection
