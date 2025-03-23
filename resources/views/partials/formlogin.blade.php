
<div id="loginModal" class="modal">
    <div class="overlay" onclick="closeModal('loginModal')"></div> <!-- Overlay -->
    <div class="modal-content">
        <span class="close" onclick="closeModal('loginModal')">&times;</span>
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</div>

