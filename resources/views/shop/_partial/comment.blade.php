<div class="card comment">
    <div class="info">
        <div class="author">{{ $comment->author->name }}</div>
        <div class="datetime">{{ $comment->created_at }}</div>
    </div>
    <div class="msg">{{ $comment->text }}</div>
</div>
