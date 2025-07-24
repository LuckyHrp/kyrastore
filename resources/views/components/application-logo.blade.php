    <style>
        @media (prefers-color-scheme: dark) {
            .theme-image {
                content: url('../storage/main/stocskle-logo-putih.png');
            }
        }

        @media (prefers-color-scheme: light) {
            .theme-image {
                content: url('../storage/main/stockle-logo-hitam.png');
            }
        }
    </style>
    <img class="theme-image w-32 mx-auto" src="{{ asset('storage/main/stockle-logo-hitam.png') }}" alt="Theme Image">
