@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📄 Danh sách bài viết</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-success">➕ Thêm bài viết</a>
    </div>

    @if ($posts->isEmpty())
        <div class="alert alert-info">Chưa có bài viết nào.</div>
    @else
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung (rút gọn)</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="post-row" data-title="{{ $post->title }}" data-content="{{ $post->content }}">
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

    <!-- MODAL -->
    <div class="modal fade" id="postDetailModal" tabindex="-1" aria-labelledby="postDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postDetailModalLabel">Chi tiết bài viết</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <h4 id="modalTitle"></h4>
                    <p id="modalContent"></p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('.post-row');
        const modal = new bootstrap.Modal(document.getElementById('postDetailModal'));

        rows.forEach(row => {
            row.addEventListener('click', function (e) {
                console.log("Click!")
                // Tránh bấm vào nút sửa/xoá cũng bị hiện modal
                if (e.target.tagName === 'A' || e.target.tagName === 'BUTTON' || e.target.closest('form')) return;

                const title = this.getAttribute('data-title');
                const content = this.getAttribute('data-content');

                document.getElementById('modalTitle').textContent = title;
                document.getElementById('modalContent').textContent = content;

                modal.show();
            });
        });
    });
</script>
@endsection

