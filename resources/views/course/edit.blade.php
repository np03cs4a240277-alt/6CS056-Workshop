<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
</head>
<body>
    <h1>Edit Course</h1>

    @if ($errors->any())
        <div>
            <h3>Please fix the following errors:</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/courses/{{ $course->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Course Name</label>
            <input
                id="name"
                name="name"
                value="{{ old('name', $course->name) }}"
            >
        </div>

        <div>
            <label for="description">Description</label>
            <textarea
                id="description"
                name="description"
            >{{ old('description', $course->description) }}</textarea>
        </div>

        <div>
            <label for="duration">Duration (weeks)</label>
            <input
                id="duration"
                name="duration"
                type="number"
                min="1"
                value="{{ old('duration', $course->duration) }}"
            >
        </div>

        <div>
            <label for="fee">Fee</label>
            <input
                id="fee"
                name="fee"
                type="number"
                min="0"
                step="0.01"
                value="{{ old('fee', $course->fee) }}"
            >
        </div>

        <div>
            <label for="difficulty">Difficulty</label>
            <select id="difficulty" name="difficulty">
                <option value="Easy" {{ old('difficulty', $course->difficulty) == 'Easy' ? 'selected' : '' }}>Easy</option>
                <option value="Medium" {{ old('difficulty', $course->difficulty) == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Hard" {{ old('difficulty', $course->difficulty) == 'Hard' ? 'selected' : '' }}>Hard</option>
            </select>
        </div>

        <input type="hidden" name="is_active" value="0">
        <label>
            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ old('is_active', (string) $course->is_active) == '1' ? 'checked' : '' }}
            >
            Active
        </label>

        <button type="submit">Update Course</button>
    </form>

    <a href="/courses">Back to Courses</a>
</body>
</html>