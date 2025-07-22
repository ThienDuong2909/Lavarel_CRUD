@extends('layouts.app')

@section('content')
    <h2>✏️ Sửa bài viết</h2>
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nội dung</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
        </div>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">⬅️ Quay lại</a>
        <button type="submit" class="btn btn-success">✅ Cập nhật</button>
    </form>
@endsection
