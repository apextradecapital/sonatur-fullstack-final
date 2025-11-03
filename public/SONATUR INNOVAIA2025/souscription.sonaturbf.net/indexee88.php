<!DOCTYPE html>
<html lang="fr">

<!-- Mirrored from souscription.sonaturbf.net/index.php?page=apropos by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Nov 2025 02:52:03 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Souscription Parcelles - SONATUR</title>
    <link rel="stylesheet" href="../cdn.jsdelivr.net/npm/tailwindcss%402.2.19/dist/tailwind.min.css">
    <script src="../cdn.jsdelivr.net/npm/alpinejs%403.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="../cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="icon" href="assets/images/logo.html" type="image/x-icon">
    <script>
        // Fonction pour formater les nombres
        function formatNumber(number) {
            return new Intl.NumberFormat('fr-FR').format(number);
        }
    </script>
    <style>
      .gradient-bg {
    background: rgb(5 150 105 / var(--tw-bg-opacity));
}

.sonatur-green {
    background-color: #2B6A39;
}

.sonatur-green-hover:hover {
    background-color: #1e4c28;
}

.header-scroll {
    transition: background-color 0.3s ease;
}

/* Écran de chargement */
.loading-screen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.95);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    transition: opacity 0.5s ease;
}

.loader-container {
    text-align: center;
}

.loader {
    width: 80px;
    height: 80px;
    border: 5px solid #f3f3f3;
    border-top: 5px solid #2B6A39;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}



.loading-text {
    margin-top: 20px;
    font-size: 18px;
    color: #2B6A39;
}

.loading-dots:after {
    content: '';
    animation: dots 1.5s infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes dots {
    0%, 20% { content: ''; }
    40% { content: '.'; }
    60% { content: '..'; }
    80%, 100% { content: '...'; }
}

    </style>
</head>
<body class="bg-gray-50">
    <!-- Écran de chargement -->
    <div id="loading-screen" class="loading-screen">
        <div class="loader-container">
        <div class="loader"></div>
           
        </div>
    </div>

    <header class="sonatur-green shadow-lg fixed w-full top-0 z-50 header-scroll">
        <nav class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <a href="index-2.html" class="text-white font-bold text-2xl">SOUSCRIPTION SONATUR</a>
                
                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button type="button" class="text-white hover:text-gray-300" id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Desktop menu -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="index-2.html" class="text-white hover:text-gray-300 transition py-2">Accueil</a>
                    <a href="indexee88.php?page=apropos" class="text-white hover:text-gray-300 transition py-2">À propos</a>
                    <a href="souscrire" class="text-white hover:text-gray-300 transition py-2">Comment souscrire</a>
                    <a href="index-2.html#pourquoi-nous" class="text-white hover:text-gray-300 transition py-2">Pourquoi nous choisir</a>
                    <a href="index53a6.html?page=contact" class="text-white hover:text-gray-300 transition py-2">Contact</a>
                    <a href="index7d78.html?page=recherche-quittance" class="text-white hover:text-gray-300 transition py-2">Rechercher une quittance</a>
                    <a href="souscrire" onclick="localStorage.clear()" class="bg-white text-emerald-700 px-6 py-2 rounded-lg hover:bg-gray-100 transition font-medium">Souscrire</a>
                </div>
            </div>

            <!-- Mobile menu -->
            <div class="hidden md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="index-2.html" class="block text-white hover:bg-emerald-600 px-3 py-2 rounded-md">Accueil</a>
                    <a href="indexee88.php?page=apropos" class="block text-white hover:bg-emerald-600 px-3 py-2 rounded-md">À propos</a>
                    <a href="souscrire" class="block text-white hover:bg-emerald-600 px-3 py-2 rounded-md">Comment souscrire</a>
                    <a href="index-2.html#pourquoi-nous" class="block text-white hover:bg-emerald-600 px-3 py-2 rounded-md">Pourquoi nous choisir</a>
                    <a href="index53a6.html?page=contact" class="block text-white hover:bg-emerald-600 px-3 py-2 rounded-md">Contact</a>
                    <a href="index7d78.html?page=recherche-quittance" class="block text-white hover:bg-emerald-600 px-3 py-2 rounded-md">Rechercher une quittance</a>
                    <a onclick="localStorage.clear()" href="souscrire" class="block bg-white text-emerald-700 px-3 py-2 rounded-md mt-4 text-center">Souscrire</a>
                </div>
            </div>
        </nav>
    </header>

    <div class="h-20"></div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const header = document.querySelector('header');
            
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    header.style.backgroundColor = 'rgba(43, 106, 57, 0.95)';
                } else {
                    header.style.backgroundColor = '#2B6A39';
                }
            });

            function toggleMenu() {
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                } else {
                    mobileMenu.classList.add('hidden');
                }
            }

            mobileMenuButton.addEventListener('click', toggleMenu);
        });
        
        // Gestion de l'écran de chargement
        document.addEventListener('DOMContentLoaded', function() {
            const loadingScreen = document.getElementById('loading-screen');
            
            // S'assurer que l'écran de chargement est visible au début
            loadingScreen.style.display = 'flex';
            loadingScreen.style.opacity = '1';

            // Attendre que tout soit chargé
            window.addEventListener('load', function() {
                setTimeout(function() {
                    loadingScreen.style.opacity = '0';
                    setTimeout(() => {
                        loadingScreen.style.display = 'none';
                    }, 500);
                }, 500);
            });
        });
    </script><footer class="bg-gray-900 text-white mt-20">
        <div class="max-w-7xl mx-auto px-6 py-12 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">
                <div>
                    <h3 class="text-lg font-semibold mb-4">SOUSCRIPTION SONATUR</h3>
                    <p class="text-gray-400">
                        La Société Nationale d'Aménagement des Terrains Urbains, votre partenaire de confiance pour l'accès à la propriété foncière.
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Liens rapides</h3>
                    <ul class="space-y-2">
                        <li>
                            <a href="indexee88.php?page=apropos" class="text-gray-400 hover:text-white transition-colors">
                                À propos
                            </a>
                        </li>
                        <li>
                            <a href="index12ce.html?page=souscrire" class="text-gray-400 hover:text-white transition-colors">
                                Comment souscrire
                            </a>
                        </li>
                        <li>
                            <a href="index-2.html#pourquoi-nous" class="text-gray-400 hover:text-white transition-colors">
                                Pourquoi nous choisir
                            </a>
                        </li>
                        <li>
                            <a href="index53a6.html?page=contact" class="text-gray-400 hover:text-white transition-colors">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li>Tél: +226 25301773/74</li>
                        <li>Email: sonatur@sonatur.bf</li>
                        <li>Avenue Kwame Nkrumah</li>
                        <li>Ouagadougou</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Suivez-nous</h3>
                    <p class="text-gray-400 mb-4">Abonnez-vous à notre page Facebook pour suivre toutes nos actualités</p>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/SonaturOfficiel/" 
                           class="text-gray-400 hover:text-white transition-colors"
                           aria-label="Facebook"
                           target="_blank"
                           rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-400">
                <p>&copy; 2025 SONATUR. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Empêcher la perte des données lors du rafraîchissement
        window.addEventListener('beforeunload', function (e) {
            // Si on est dans le processus de souscription (étapes 1 à 6)
            const currentEtape = parseInt(localStorage.getItem('currentEtape') || '0');
            if (currentEtape > 0 && currentEtape < 7) {
                return;
            }
        });
    </script>
</body>

<!-- Mirrored from souscription.sonaturbf.net/index.php?page=apropos by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Nov 2025 02:52:03 GMT -->
</html>