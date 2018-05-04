<h2>ENTRAR NO SISTEMA</h2>

<a href="/">VOLTAR</a>
<br>
<br>

<form action="/login" method="post">
    @csrf
    
    <br>
    <label for="email">NOME:</label>
    <input type="email" name="email" required>
    <br>

    <label for="password">SENHA:</label>
    <input type="password" name="password" required>
    <br>

    <br>
    <button type="submit">ENTRAR</button>

</form>