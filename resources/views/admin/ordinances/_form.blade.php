<p>
    <label for="ordinance_number">Ordinance Number *</label><br>
    <input type="text" name="ordinance_number" id="ordinance_number"
           value="{{ old('ordinance_number', $ordinance->ordinance_number ?? '') }}">
    @error('ordinance_number')
        <br><strong>{{ $message }}</strong>
    @enderror
</p>

<p>
    <label for="title">Title *</label><br>
    <input type="text" name="title" id="title" size="80"
           value="{{ old('title', $ordinance->title ?? '') }}">
    @error('title')
        <br><strong>{{ $message }}</strong>
    @enderror
</p>

<p>
    <label for="date_passed">Date Passed *</label><br>
    <input type="date" name="date_passed" id="date_passed"
           value="{{ old('date_passed', isset($ordinance) ? $ordinance->date_passed->format('Y-m-d') : '') }}">
    @error('date_passed')
        <br><strong>{{ $message }}</strong>
    @enderror
</p>

<p>
    <label for="author">Author/Sponsor *</label><br>
    <input type="text" name="author" id="author" size="40"
           value="{{ old('author', $ordinance->author ?? '') }}">
    @error('author')
        <br><strong>{{ $message }}</strong>
    @enderror
</p>

<p>
    <label for="description">Description (optional)</label><br>
    <textarea name="description" id="description" rows="4" cols="80">{{ old('description', $ordinance->description ?? '') }}</textarea>
    @error('description')
        <br><strong>{{ $message }}</strong>
    @enderror
</p>
