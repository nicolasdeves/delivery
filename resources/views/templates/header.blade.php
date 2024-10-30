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
        </div>
    </div>
    <nav>
        <ul>
            <li><a href="{{ route('inicio') }} " class="{{ Route::currentRouteName() == 'inicio' ? 'sublinhado' : '' }}">Início</a></li>
            <li><a href="{{ route('cardapio') }}" class="{{ Route::currentRouteName() == 'cardapio' ? 'sublinhado' : '' }}">Cardápio</a></li>
            <li><a href="{{ route('inicio-delivery')}}" class="{{ Route::currentRouteName() == 'inicio-delivery' ? 'sublinhado' : '' }}">Delivery</a></li>
            <li><a href="{{ route('sobre_nos') }}" class="{{ Route::currentRouteName() == 'sobre_nos' ? 'sublinhado' : '' }}">Sobre nós</a></li>
        </ul>
    </nav>
</header>