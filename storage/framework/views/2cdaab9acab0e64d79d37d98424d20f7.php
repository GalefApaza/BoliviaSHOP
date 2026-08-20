
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoliSHOP - Tienda Don Justo</title>
    
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 1rem;
            background-color: #f4f4f4;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }
        
        header {
            background: #2c3e50;
            color: #fff;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            transition: background-color 0.3s;
        }
        
        header h1 {
            margin: 0;
        }
        
        nav {
            background: #34495e;
            padding: 10px;
            border-radius: 4px;
            margin: 10px 0;
            transition: background-color 0.3s;
        }
        
        nav a {
            color: #ffd;
            margin-right: 1rem;
            text-decoration: none;
            padding: 5px 10px;
            transition: color 0.3s;
        }
        
        nav a:hover {
            background: #1abc9c;
            border-radius: 4px;
        }
        
        main {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            min-height: 400px;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        
        main h2 {
            color: #2c3e50;
            border-bottom: 2px solid #ecf0f1;
            padding-bottom: 10px;
            margin-bottom: 20px;
            transition: color 0.3s, border-color 0.3s;
        }
        
        footer {
            margin-top: 20px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            text-align: center;
            transition: color 0.3s, border-color 0.3s;
        }
        
        /* Estilos para el formulario */
        form div {
            margin-bottom: 15px;
        }
        
        form label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        form input,
        form textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s;
        }
        
        form button {
            background: #2c3e50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }
        
        form button:hover {
            background: #1abc9c;
        }
        
        /* Botón de modo oscuro */
        .btn-modo {
            background: #1abc9c;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        
        .btn-modo:hover {
            background: #16a085;
        }
        
        /* Mensajes de éxito/error */
        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #c3e6cb;
            margin-bottom: 20px;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #f5c6cb;
            margin-bottom: 20px;
        }
        
        .alert-error ul {
            margin: 0;
            padding-left: 20px;
        }
        
        /* ============================================================
           MODO OSCURO (estilos adicionales para body.dark)
           ============================================================ */
        body.dark {
            background-color: #1a1a2e;
            color: #e0e0e0;
        }
        
        body.dark header {
            background-color: #16213e;
            color: #e0e0e0;
        }
        
        body.dark nav {
            background-color: #0f3460;
        }
        
        body.dark nav a {
            color: #e0e0e0;
        }
        
        body.dark nav a:hover {
            background-color: #1abc9c;
        }
        
        body.dark main {
            background-color: #16213e;
            color: #e0e0e0;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        
        body.dark main h2 {
            color: #1abc9c;
            border-bottom-color: #0f3460;
        }
        
        body.dark footer {
            color: #888;
            border-top-color: #0f3460;
        }
        
        body.dark form input,
        body.dark form textarea {
            background-color: #0f3460;
            border-color: #1a1a2e;
            color: #e0e0e0;
        }
        
        body.dark form button {
            background-color: #1abc9c;
            color: #1a1a2e;
        }
        
        body.dark form button:hover {
            background-color: #16a085;
        }
        
        body.dark .btn-modo {
            background-color: #e67e22;
            color: #fff;
        }
        
        body.dark .btn-modo:hover {
            background-color: #d35400;
        }
        
        body.dark .alert-success {
            background: #1a3a2a;
            color: #8fde9e;
            border-color: #2d6a4f;
        }
        
        body.dark .alert-error {
            background: #3a1a1a;
            color: #de8f8f;
            border-color: #6a2d2d;
        }
    </style>
</head>
<body>
    <header>
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
            <div>
                <h1>🏪 BoliSHOP</h1>
                <p>Tu tienda virtual de Bolivia</p>
            </div>
            <button class="btn-modo" id="btn-tema">🌙 Modo Oscuro</button>
        </div>
    </header>
    
    <nav>
        <a href="/inicio">Inicio</a>
        <a href="/contacto">Contacto</a>
        <a href="/productos">Productos</a>
        
        
        <?php if(auth()->guard()->check()): ?>
            <a href="/panel">📊 Panel</a>
            <form action="/logout" method="POST" style="display: inline;">
                <?php echo csrf_field(); ?>
                <button type="submit" style="background: none; border: none; color: #ffd; cursor: pointer; padding: 5px 10px;">
                    🚪 Salir
                </button>
            </form>
        <?php else: ?>
            <a href="/login">INICIAR SESIÓN</a>
        <?php endif; ?>
    </nav>
    
    <main>
        
        <?php echo $__env->yieldContent('contenido'); ?>
    </main>
    
<footer>
        <footer>
    <p>© 2026 BoliSHOP - Todos los derechos reservados</p>
    <p>
        <a href="#" style="color: #1abc9c; text-decoration: none;">Facebook</a> |
        <a href="#" style="color: #1abc9c; text-decoration: none;">Instagram</a> |
        <a href="#" style="color: #1abc9c; text-decoration: none;">WhatsApp</a>
    </p>
</footer>
    </footer>

    
    <script>
        // ============================================================
        // MODO OSCURO - CLASE 13
        // Alterna la clase 'dark' en el body y guarda la preferencia
        // para que persista al recargar la página.
        // ============================================================
        
        const cuerpo = document.querySelector("body");
        const botonModo = document.querySelector("#btn-tema");
        
        // 1. ¿Ya había una preferencia guardada?
        const modoGuardado = localStorage.getItem("modo");
        
        if (modoGuardado === "oscuro") {
            cuerpo.classList.add("dark");
            botonModo.textContent = "☀️ Modo Claro";
        }
        
        // 2. Alternar al hacer clic
        function alternarModo() {
            cuerpo.classList.toggle("dark");
            
            if (cuerpo.classList.contains("dark")) {
                botonModo.textContent = "☀️ Modo Claro";
                localStorage.setItem("modo", "oscuro");
            } else {
                botonModo.textContent = "🌙 Modo Oscuro";
                localStorage.setItem("modo", "claro");
            }
        }
        
        botonModo.addEventListener("click", alternarModo);
    </script>
</body>
</html><?php /**PATH C:\laragon\www\BoliShop\resources\views/layouts/base.blade.php ENDPATH**/ ?>