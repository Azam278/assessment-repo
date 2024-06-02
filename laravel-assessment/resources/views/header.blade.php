<header class="header">
    <h2 class="framework">Laravel</h2>
    <div class="dropdown">
        <button class="dropbtn">
            <h3>{{ Auth::user()->name }}</h3>
        </button>
        <div class="dropdown-content">
            <form action="/logout" method="post" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </div>
</header>