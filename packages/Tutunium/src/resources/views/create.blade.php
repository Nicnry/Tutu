<!-- resources/views/users/create.blade.php -->

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <div>
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
    </div>

    <div>
        <label for="email">Adresse email :</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
    </div>

    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password">
    </div>

    <div>
        <label for="password_confirmation">Confirmation du mot de passe :</label>
        <input type="password" name="password_confirmation" id="password_confirmation">
    </div>

    <button type="submit">Créer l'utilisateur</button>
</form>
