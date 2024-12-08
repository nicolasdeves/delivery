<header class="lora-font">
    <div class="top-bar">
        <div class="contact-info">
            <span><i class="fas fa-phone-alt"></i> +55 51 997023202</span>
            <span><i class="fas fa-envelope"></i> laporto@gmail.com.br</span>
        </div>
        <div class="social-icons">
            <a href="/adm/loginAdm" title="Área do Administrador"><i class="fas fa-lock"></i></a>
            <a href="https://www.facebook.com/people/LaPorto/100063575576619/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/laportobar/" target="_blank"><i class="fab fa-instagram"></i></a>

            <div class="dropdown">
                <a href="javascript:void(0)" title="Perfil do usuário" class="perfil" id="perfil-icon">
                    <i class="fas fa-user"></i>
                </a>

                @auth
                <ul class="dropdown-menu" id="dropdown-menu">
                    <li><a href="{{ route('lista-reservas-mesa') }}">Reservas</a></li>
                    <li><a href="{{ route('enderecos-usuario') }}">Endereços</a></li>
                    <li><a href="{{ route('pedidos-usuario') }}">Pedidos</a></li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; color: inherit; cursor: pointer;">
                                Sair
                            </button>
                        </form>
                    </li>

                </ul>
                @endauth

                @guest
                <ul class="dropdown-menu" id="dropdown-menu">
                    <li><a href="{{ route('autenticar-usuario') }}">Fazer login</a></li>

                </ul>
                @endguest
            </div>

            <div class="user-name">
                @auth <p>{{ Auth::user()->nome }}</p> @endauth
            </div>
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="{{ route('inicio') }}" class="{{ Route::currentRouteName() == 'inicio' ? 'sublinhado' : '' }}">Início</a></li>
            <li><a href="{{ route('cardapio') }}" class="{{ Route::currentRouteName() == 'cardapio' ? 'sublinhado' : '' }}">Cardápio</a></li>
            <li><a href="{{ route('inicio-delivery') }}" class="{{ Route::currentRouteName() == 'inicio-delivery' ? 'sublinhado' : '' }}">Delivery</a></li>
            <li><a href="{{ route('sobre_nos') }}" class="{{ Route::currentRouteName() == 'sobre_nos' ? 'sublinhado' : '' }}">Sobre nós</a></li>
            <li><a href="{{ route('reserva-mesa') }}" class="{{ Route::currentRouteName() == 'reserva-mesa' ? 'sublinhado' : '' }}">Reserva de mesas</a></li>
        </ul>
    </nav>
</header>

<!-- CSS -->
<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        right: 0;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        list-style: none;
        padding: 0;
        margin: 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000;
    }

    .dropdown-menu li {
        padding: 10px 20px;
    }

    .dropdown-menu li a {
        text-decoration: none;
        color: #333;
    }

    .dropdown-menu li:hover {
        background-color: #f5f5f5;
    }


    .social-icons {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .user-name p {
        margin: 0;
        font-size: 14px; /* Ajuste o tamanho conforme necessário */
    }
</style>

<!-- JavaScript -->
<script>
    const perfilIcon = document.getElementById("perfil-icon");
    const dropdownMenu = document.getElementById("dropdown-menu");

    perfilIcon.addEventListener("click", () => {
        // Toggle visibility do menu
        dropdownMenu.style.display =
            dropdownMenu.style.display === "block" ? "none" : "block";
    });

    // Fecha o menu ao clicar fora dele
    document.addEventListener("click", (event) => {
        if (!perfilIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = "none";
        }
    });
</script>
