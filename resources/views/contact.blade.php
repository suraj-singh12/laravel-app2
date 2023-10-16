<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
</head>
<body>
    <h1>Contact Us</h1>
    <form action="/contact" method="POST">
        @csrf
        {{-- Cross Site Request Forgery --}}
        {{-- alongwith data csrf token will be also sent in every request,
            the token will be same everytime as generated when user logs in
            this ensures that data has come from genuine source(i.e. from website & from current user itself)
            this prevents any fishing or false request on the name of user by someone else
            because we will check csrf token everytime, if it does not match, do not process --}}
        <div>
            <label for="name">Name: </label>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
                {{-- old(var)  is used to fetch the previous value of var --}}
            @error('email')
                <p> {{ $message }} </p>
            @enderror
        </div>

        <div>
            <label for="phone">Phone Number: </label>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}">
            @error('phone')
                <p> {{ $message }} </p>
            @enderror
        </div>

        <div>
            <label for="message">Message: </label>
            <textarea name="message" id="message">
                {{ old('message') }}
            </textarea>
            @error('message')
                <p> {{ $message }} </p>
            @enderror
        </div>

        <div>
            {{ Form::customDateInput('custom_date', null, ['id' => 'custom_date_field']) }}
        </div>
        
        <button type="submit">Submit</button>

    </form>
</body>
</html>
