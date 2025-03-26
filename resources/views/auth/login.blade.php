<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Global Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #74ebd5 10%, #9face6 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form Container */
        form {
            width: 400px;
            padding: 30px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            transition: transform 0.3s ease;
        }

        /* Hover Effect for Form */
        form:hover {
            transform: translateY(-5px);
        }

        /* Form Title */
        form h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
        }

        /* Input Fields */
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f7f7f7;
            transition: border-color 0.3s, box-shadow 0.3s;
            box-sizing: border-box;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #5c6bc0;
            box-shadow: 0 0 5px rgba(92, 107, 192, 0.5);
            outline: none;
        }

        /* Placeholder Styling */
        input::placeholder {
            color: #888;
            font-style: italic;
        }

        /* Error Message */
        .error-message {
            color: #f44336;
            font-size: 14px;
            margin-top: 10px;
            font-weight: 500;
        }

        /* Submit Button */
        button {
            width: 100%;
            padding: 15px;
            background-color: #5c6bc0;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s ease;
            font-weight: 600;
        }

        /* Button Hover Effect */
        button:hover {
            background-color: #3f51b5;
            transform: translateY(-3px);
        }

        /* Button Active Effect */
        button:active {
            transform: translateY(1px);
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            form {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h2>Login</h2>

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        @error('email')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <input type="password" name="password" placeholder="Password">
        @error('password')
            <div class="error-message">{{ $message }}</div>
        @enderror

        <button type="submit">Login</button>

        <!-- Display the error message if it exists -->
        @if(session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
    </form>
</body>
</html>
