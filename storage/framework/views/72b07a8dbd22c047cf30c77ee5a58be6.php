<nav x-data="{ userMenuOpen: false, mobileMenuOpen: false }" class="bg-white border-b border-gray-200 px-4 sm:px-6 lg:px-8 relative z-50">
    <div class="flex items-center justify-between h-16">
        <!-- Sisi Kiri - Logo & Brand -->
        <div class="flex items-center space-x-3">
            <!-- Logo -->
            <div class="bg-indigo-600 p-2 rounded-md">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                </svg>
            </div>

            <!-- Brand Text -->
            <div>
                <div class="text-xl font-bold text-gray-900">UDO</div>
                <div class="text-xs text-gray-500 -mt-1">University Day's Out</div>
            </div>
        </div>

        <!-- Menu Navigasi Tengah -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="<?php echo e(route('homepage')); ?>" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors duration-200 <?php echo e(request()->routeIs('homepage') ? 'text-indigo-600 border-b-2 border-indigo-600' : ''); ?>">
                Home
            </a>
            <a href="<?php echo e(route('universities.index')); ?>" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors duration-200 <?php echo e(request()->routeIs('universities.*') ? 'text-indigo-600 border-b-2 border-indigo-600' : ''); ?>">
                Universitas
            </a>
            <a href="#" class="text-gray-700 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors duration-200">
                Vote
            </a>
        </div>

        <!-- Mobile Menu Toggle (tampil hanya di mobile) -->
        <div class="md:hidden">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Sisi Kanan - User Info & Stats -->
        <div class="flex items-center space-x-4">
            <?php if(auth()->guard()->check()): ?>
                <!-- Welcome Bubble -->
                <div class="bg-green-100 rounded-full py-1 px-3 flex items-center space-x-2">
                    <!-- Avatar -->
                    <div class="w-6 h-6 bg-green-600 rounded-full flex items-center justify-center text-white text-xs font-semibold">
                        <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                    </div>
                    <!-- Welcome Text -->
                    <div class="text-xs">
                        <div class="font-medium text-green-800">Halo, <?php echo e(Auth::user()->name); ?>!</div>
                        <div class="text-green-600">Selamat datang di UDO Platform</div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Info Universitas -->
            <div class="bg-blue-100 rounded-full py-1 px-3 flex items-center space-x-2">
                <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs">
                    🎓
                </div>
                <div class="text-xs">
                    <div class="font-medium text-blue-800"><?php echo e($universityCount ?? 15); ?> Universitas</div>
                    <div class="text-blue-600">Tersedia</div>
                </div>
            </div>

            <?php if(auth()->guard()->check()): ?>
                <!-- User Menu Dropdown -->
                <div class="relative">
                    <button @click="userMenuOpen = !userMenuOpen" class="flex items-center space-x-1 text-gray-700 hover:text-gray-900 focus:outline-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="userMenuOpen" @click.away="userMenuOpen = false" x-transition class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                        <a href="<?php echo e(route('profile.edit')); ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition class="md:hidden border-t border-gray-200">
        <div class="px-4 py-3 space-y-1">
            <a href="<?php echo e(route('homepage')); ?>" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md <?php echo e(request()->routeIs('homepage') ? 'text-indigo-600 bg-indigo-50' : ''); ?>">
                Home
            </a>
            <a href="<?php echo e(route('universities.index')); ?>" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md <?php echo e(request()->routeIs('universities.*') ? 'text-indigo-600 bg-indigo-50' : ''); ?>">
                Universitas
            </a>
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 rounded-md">
                Vote
            </a>
        </div>
    </div>

</nav>
<?php /**PATH D:\Coding\UDO\udo-platform\resources\views/layouts/navigation.blade.php ENDPATH**/ ?>