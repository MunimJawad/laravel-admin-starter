<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('register') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block mb-1 font-semibold">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="w-full border rounded px-3 py-2 @error('name') border-red-500 @enderror">
         
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block mb-1 font-semibold">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="w-full border rounded px-3 py-2 @error('email') border-red-500 @enderror">
          
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block mb-1 font-semibold">Password</label>
            <input type="password" name="password" id="password"
                   class="w-full border rounded px-3 py-2 @error('password') border-red-500 @enderror">
           
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="block mb-1 font-semibold">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="w-full border rounded px-3 py-2">
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label for="role" class="block mb-1 font-semibold">Role (Optional)</label>
            <select name="role" id="role" class="w-full border rounded px-3 py-2">
                <option value="">Select Role</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="editor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Editor</option>
                <option value="user" {{ old('role') == 'patient' ? 'selected' : '' }}>Role</option>
            </select>
          
        </div>

        <!-- Submit -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Register
            </button>
        </div>

       
    </form>
</body>
</html>