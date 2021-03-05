@csrf
<div class="md-form">
    <label for="title">タイトル</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $article->title ?? old('title') }}" required>
    <div class="form-group">
        <article-tags-input
        >
        </article-tags-input>
    </div>
</div>
<div class="form-group">
    <label></label>
    <textarea class="form-control" name="body" id="body" rows="16" placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
</div>