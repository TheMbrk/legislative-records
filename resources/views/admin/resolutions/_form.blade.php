<p>
    <label for="resolution_number">Resolution Number *</label><br>
    <input type="text" name="resolution_number" id="resolution_number"
           value="{{ old('resolution_number', $resolution->resolution_number ?? '') }}">
    @error('resolution_number')
        <br><strong>{{ $message }}</strong>
    @enderror
</p>

<p>
    <label for="title">Title *</label><br>
    <input type="text" name="title" id="title" size="80"
           value="{{ old('title', $resolution->title ?? '') }}">
    @error('title')
        <br><strong>{{ $message }}</strong>
    @enderror
</p>

<p>
    <label for="date_passed">Date Passed *</label><br>
    <input type="date" name="date_passed" id="date_passed"
           value="{{ old('date_passed', isset($resolution) ? $resolution->date_passed->format('Y-m-d') : '') }}">
    @error('date_passed')
        <br><strong>{{ $message }}</strong>
    @enderror
</p>

<p>
    <label for="author">Author/Sponsor *</label><br>
    <input type="text" name="author" id="author" size="40"
           value="{{ old('author', $resolution->author ?? '') }}">
    @error('author')
        <br><strong>{{ $message }}</strong>
    @enderror
</p>

<p>
    <label for="description">Description (optional)</label><br>
    <textarea name="description" id="description" rows="4" cols="80">{{ old('description', $resolution->description ?? '') }}</textarea>
    @error('description')
        <br><strong>{{ $message }}</strong>
    @enderror
</p>
