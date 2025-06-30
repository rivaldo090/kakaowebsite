<aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-green-700 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-40">
    <div class="p-4">
        <h2 class="text-xl font-bold mb-4">Menu Sistem</h2>
        <ul class="space-y-4">
            <li>
                <a href="{{ route('setting_wattering') }}" class="block bg-green-600 hover:bg-green-500 text-center text-white font-semibold py-3 px-4 rounded-lg shadow-md transform hover:scale-105 transition duration-200">Penyiraman</a>
            </li>
            <li>
                <a href="{{ route('setting_lighting') }}" class="block bg-yellow-600 hover:bg-yellow-500 text-center text-white font-semibold py-3 px-4 rounded-lg shadow-md transform hover:scale-105 transition duration-200">Pencahayaan</a>
            </li>
            <li>
                <a href="{{ route('pemupukan') }}" class="block bg-blue-600 hover:bg-blue-500 text-center text-white font-semibold py-3 px-4 rounded-lg shadow-md transform hover:scale-105 transition duration-200">Pemberian Pupuk</a>
            </li>
            <li>
                <a href="https://wa.me/083852743444" target="_blank" class="block bg-red-600 hover:bg-red-500 text-center text-white font-semibold py-3 px-4 rounded-lg shadow-md transform hover:scale-105 transition duration-200">Hubungi Admin</a>
            </li>
        </ul>
    </div>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');

        if (menuToggle && sidebar) {
            // Toggle sidebar
            menuToggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });

            // Tutup sidebar jika klik di luar (mobile only)
            document.addEventListener('click', (event) => {
                if (
                    window.innerWidth < 1024 &&
                    !sidebar.contains(event.target) &&
                    !menuToggle.contains(event.target)
                ) {
                    sidebar.classList.add('-translate-x-full');
                }
            });
        }
    });
</script>
