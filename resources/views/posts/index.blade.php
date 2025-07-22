@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📄 Danh sách bài viết</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-success">➕ Thêm bài viết</a>
    </div>

    @if ($posts->isEmpty())
        <div class="alert alert-info">Chưa có bài viết nào.</div>
    @else
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ Str::limit($post->content, 50) }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">✏️ Sửa</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Bạn chắc chắn muốn xoá?')" class="btn btn-danger btn-sm">🗑️ Xoá</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
