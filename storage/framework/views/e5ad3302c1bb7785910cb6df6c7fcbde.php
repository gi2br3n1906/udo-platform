
<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-xl">
    
    <div class="grid grid-cols-14 gap-2 min-h-[600px]">

        
        <div class="col-start-4 col-span-8 row-start-1 bg-gradient-to-r from-gray-800 via-gray-900 to-gray-800 text-white font-bold text-center p-6 rounded-xl flex items-center justify-center shadow-lg border-2 border-gray-700">
            <div>
                <div class="text-3xl mb-3">🎤</div>
                <span class="text-xl font-extrabold">PANGGUNG UTAMA</span>
                <div class="text-sm opacity-90 mt-2">Presentasi Universitas</div>
            </div>
        </div>

        
        <?php
            $universityBooths = [
                'B24' => ['name' => 'Telkom University', 'slug' => 'telkom-university', 'color' => 'purple'],
                'B23' => ['name' => 'UGM', 'slug' => 'ugm', 'color' => 'blue'],
                'B22' => ['name' => 'ITB', 'slug' => 'itb', 'color' => 'indigo'],
                'B21' => ['name' => 'UNDIP', 'slug' => 'undip', 'color' => 'green'],
                'B20' => ['name' => 'UNAIR', 'slug' => 'unair', 'color' => 'cyan'],
                'A7' => ['name' => 'UI', 'slug' => 'ui', 'color' => 'yellow'],
                'A6' => ['name' => 'ITS', 'slug' => 'its', 'color' => 'teal'],
                'B19' => ['name' => 'UNHAS', 'slug' => 'unhas', 'color' => 'red'],
                'B18' => ['name' => 'UNPAD', 'slug' => 'unpad', 'color' => 'pink'],
                'B17' => ['name' => 'USU', 'slug' => 'usu', 'color' => 'orange'],
                'B16' => ['name' => 'UNSRI', 'slug' => 'unsri', 'color' => 'amber'],
                'B15' => ['name' => 'UNAND', 'slug' => 'unand', 'color' => 'lime'],
                'B14' => ['name' => 'UB', 'slug' => 'ub', 'color' => 'emerald'],
                'B5' => ['name' => 'UNSOED', 'slug' => 'unsoed', 'color' => 'violet'],
                'B4' => ['name' => 'UNNES', 'slug' => 'unnes', 'color' => 'fuchsia'],
                'B6' => ['name' => 'UPI', 'slug' => 'upi', 'color' => 'rose'],
                'B7' => ['name' => 'UNY', 'slug' => 'uny', 'color' => 'sky'],
                'B8' => ['name' => 'UNESA', 'slug' => 'unesa', 'color' => 'slate'],
                'B9' => ['name' => 'UNS', 'slug' => 'uns', 'color' => 'zinc'],
                'B1' => ['name' => 'BINUS', 'slug' => 'binus', 'color' => 'blue'],
                'B2' => ['name' => 'TRISAKTI', 'slug' => 'trisakti', 'color' => 'purple'],
                'B3' => ['name' => 'ATMA JAYA', 'slug' => 'atma-jaya', 'color' => 'green'],
                'A1' => ['name' => 'MERCUBUANA', 'slug' => 'mercubuana', 'color' => 'red'],
                'A2' => ['name' => 'GUNADARMA', 'slug' => 'gunadarma', 'color' => 'yellow'],
                'C2' => ['name' => 'PANCASILA', 'slug' => 'pancasila', 'color' => 'indigo'],
                'A5' => ['name' => 'PARAMADINA', 'slug' => 'paramadina', 'color' => 'teal'],
                'A4' => ['name' => 'ESA UNGGUL', 'slug' => 'esa-unggul', 'color' => 'orange'],
                'A3' => ['name' => 'TARUMANAGARA', 'slug' => 'tarumanagara', 'color' => 'pink'],
                'C1' => ['name' => 'PELITA HARAPAN', 'slug' => 'pelita-harapan', 'color' => 'cyan']
            ];
        ?>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B24']['slug'])); ?>"
           class="col-start-1 row-start-2 flex flex-col items-center justify-center p-2 bg-purple-100 border border-purple-300 rounded-md shadow-sm hover:shadow-lg hover:border-purple-500 transition-all duration-200">
            <span class="font-bold text-sm text-purple-800">B24</span>
            <span class="text-xs text-purple-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B24']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B23']['slug'])); ?>"
           class="col-start-1 row-start-3 flex flex-col items-center justify-center p-2 bg-blue-100 border border-blue-300 rounded-md shadow-sm hover:shadow-lg hover:border-blue-500 transition-all duration-200">
            <span class="font-bold text-sm text-blue-800">B23</span>
            <span class="text-xs text-blue-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B23']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B22']['slug'])); ?>"
           class="col-start-1 row-start-4 flex flex-col items-center justify-center p-2 bg-indigo-100 border border-indigo-300 rounded-md shadow-sm hover:shadow-lg hover:border-indigo-500 transition-all duration-200">
            <span class="font-bold text-sm text-indigo-800">B22</span>
            <span class="text-xs text-indigo-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B22']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B21']['slug'])); ?>"
           class="col-start-1 row-start-5 flex flex-col items-center justify-center p-2 bg-green-100 border border-green-300 rounded-md shadow-sm hover:shadow-lg hover:border-green-500 transition-all duration-200">
            <span class="font-bold text-sm text-green-800">B21</span>
            <span class="text-xs text-green-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B21']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B20']['slug'])); ?>"
           class="col-start-1 row-start-6 flex flex-col items-center justify-center p-2 bg-cyan-100 border border-cyan-300 rounded-md shadow-sm hover:shadow-lg hover:border-cyan-500 transition-all duration-200">
            <span class="font-bold text-sm text-cyan-800">B20</span>
            <span class="text-xs text-cyan-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B20']['name']); ?></span>
        </a>

        
        
        <a href="<?php echo e(route('universities.show', $universityBooths['B19']['slug'])); ?>"
           class="col-start-5 row-start-3 flex flex-col items-center justify-center p-2 bg-red-100 border border-red-300 rounded-md shadow-sm hover:shadow-lg hover:border-red-500 transition-all duration-200">
            <span class="font-bold text-sm text-red-800">B19</span>
            <span class="text-xs text-red-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B19']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B18']['slug'])); ?>"
           class="col-start-6 row-start-3 flex flex-col items-center justify-center p-2 bg-pink-100 border border-pink-300 rounded-md shadow-sm hover:shadow-lg hover:border-pink-500 transition-all duration-200">
            <span class="font-bold text-sm text-pink-800">B18</span>
            <span class="text-xs text-pink-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B18']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B17']['slug'])); ?>"
           class="col-start-5 row-start-4 flex flex-col items-center justify-center p-2 bg-orange-100 border border-orange-300 rounded-md shadow-sm hover:shadow-lg hover:border-orange-500 transition-all duration-200">
            <span class="font-bold text-sm text-orange-800">B17</span>
            <span class="text-xs text-orange-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B17']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B16']['slug'])); ?>"
           class="col-start-6 row-start-4 flex flex-col items-center justify-center p-2 bg-amber-100 border border-amber-300 rounded-md shadow-sm hover:shadow-lg hover:border-amber-500 transition-all duration-200">
            <span class="font-bold text-sm text-amber-800">B16</span>
            <span class="text-xs text-amber-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B16']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B15']['slug'])); ?>"
           class="col-start-5 row-start-5 flex flex-col items-center justify-center p-2 bg-lime-100 border border-lime-300 rounded-md shadow-sm hover:shadow-lg hover:border-lime-500 transition-all duration-200">
            <span class="font-bold text-sm text-lime-800">B15</span>
            <span class="text-xs text-lime-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B15']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B14']['slug'])); ?>"
           class="col-start-6 row-start-5 flex flex-col items-center justify-center p-2 bg-emerald-100 border border-emerald-300 rounded-md shadow-sm hover:shadow-lg hover:border-emerald-500 transition-all duration-200">
            <span class="font-bold text-sm text-emerald-800">B14</span>
            <span class="text-xs text-emerald-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B14']['name']); ?></span>
        </a>

        
        
        <a href="<?php echo e(route('universities.show', $universityBooths['B5']['slug'])); ?>"
           class="col-start-8 row-start-3 flex flex-col items-center justify-center p-2 bg-violet-100 border border-violet-300 rounded-md shadow-sm hover:shadow-lg hover:border-violet-500 transition-all duration-200">
            <span class="font-bold text-sm text-violet-800">B5</span>
            <span class="text-xs text-violet-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B5']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B4']['slug'])); ?>"
           class="col-start-9 row-start-3 flex flex-col items-center justify-center p-2 bg-fuchsia-100 border border-fuchsia-300 rounded-md shadow-sm hover:shadow-lg hover:border-fuchsia-500 transition-all duration-200">
            <span class="font-bold text-sm text-fuchsia-800">B4</span>
            <span class="text-xs text-fuchsia-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B4']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B6']['slug'])); ?>"
           class="col-start-8 row-start-4 flex flex-col items-center justify-center p-2 bg-rose-100 border border-rose-300 rounded-md shadow-sm hover:shadow-lg hover:border-rose-500 transition-all duration-200">
            <span class="font-bold text-sm text-rose-800">B6</span>
            <span class="text-xs text-rose-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B6']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B7']['slug'])); ?>"
           class="col-start-9 row-start-4 flex flex-col items-center justify-center p-2 bg-sky-100 border border-sky-300 rounded-md shadow-sm hover:shadow-lg hover:border-sky-500 transition-all duration-200">
            <span class="font-bold text-sm text-sky-800">B7</span>
            <span class="text-xs text-sky-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B7']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B8']['slug'])); ?>"
           class="col-start-8 row-start-5 flex flex-col items-center justify-center p-2 bg-slate-100 border border-slate-300 rounded-md shadow-sm hover:shadow-lg hover:border-slate-500 transition-all duration-200">
            <span class="font-bold text-sm text-slate-800">B8</span>
            <span class="text-xs text-slate-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B8']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B9']['slug'])); ?>"
           class="col-start-9 row-start-5 flex flex-col items-center justify-center p-2 bg-zinc-100 border border-zinc-300 rounded-md shadow-sm hover:shadow-lg hover:border-zinc-500 transition-all duration-200">
            <span class="font-bold text-sm text-zinc-800">B9</span>
            <span class="text-xs text-zinc-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B9']['name']); ?></span>
        </a>

        
        
        <a href="<?php echo e(route('universities.show', $universityBooths['B1']['slug'])); ?>"
           class="col-start-13 row-start-2 flex flex-col items-center justify-center p-2 bg-blue-100 border border-blue-300 rounded-md shadow-sm hover:shadow-lg hover:border-blue-500 transition-all duration-200">
            <span class="font-bold text-sm text-blue-800">B1</span>
            <span class="text-xs text-blue-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B1']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B2']['slug'])); ?>"
           class="col-start-13 row-start-3 flex flex-col items-center justify-center p-2 bg-purple-100 border border-purple-300 rounded-md shadow-sm hover:shadow-lg hover:border-purple-500 transition-all duration-200">
            <span class="font-bold text-sm text-purple-800">B2</span>
            <span class="text-xs text-purple-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B2']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['B3']['slug'])); ?>"
           class="col-start-13 row-start-4 flex flex-col items-center justify-center p-2 bg-green-100 border border-green-300 rounded-md shadow-sm hover:shadow-lg hover:border-green-500 transition-all duration-200">
            <span class="font-bold text-sm text-green-800">B3</span>
            <span class="text-xs text-green-600 text-center leading-tight mt-1"><?php echo e($universityBooths['B3']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['A1']['slug'])); ?>"
           class="col-start-13 row-start-5 flex flex-col items-center justify-center p-2 bg-red-100 border border-red-300 rounded-md shadow-sm hover:shadow-lg hover:border-red-500 transition-all duration-200">
            <span class="font-bold text-sm text-red-800">A1</span>
            <span class="text-xs text-red-600 text-center leading-tight mt-1"><?php echo e($universityBooths['A1']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['A2']['slug'])); ?>"
           class="col-start-13 row-start-6 flex flex-col items-center justify-center p-2 bg-yellow-100 border border-yellow-300 rounded-md shadow-sm hover:shadow-lg hover:border-yellow-500 transition-all duration-200">
            <span class="font-bold text-sm text-yellow-800">A2</span>
            <span class="text-xs text-yellow-600 text-center leading-tight mt-1"><?php echo e($universityBooths['A2']['name']); ?></span>
        </a>

        
        
        <a href="<?php echo e(route('universities.show', $universityBooths['A5']['slug'])); ?>"
           class="col-start-5 row-start-8 flex flex-col items-center justify-center p-2 bg-teal-100 border border-teal-300 rounded-md shadow-sm hover:shadow-lg hover:border-teal-500 transition-all duration-200">
            <span class="font-bold text-sm text-teal-800">A5</span>
            <span class="text-xs text-teal-600 text-center leading-tight mt-1"><?php echo e($universityBooths['A5']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['A4']['slug'])); ?>"
           class="col-start-6 row-start-8 flex flex-col items-center justify-center p-2 bg-orange-100 border border-orange-300 rounded-md shadow-sm hover:shadow-lg hover:border-orange-500 transition-all duration-200">
            <span class="font-bold text-sm text-orange-800">A4</span>
            <span class="text-xs text-orange-600 text-center leading-tight mt-1"><?php echo e($universityBooths['A4']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['A3']['slug'])); ?>"
           class="col-start-8 row-start-8 flex flex-col items-center justify-center p-2 bg-pink-100 border border-pink-300 rounded-md shadow-sm hover:shadow-lg hover:border-pink-500 transition-all duration-200">
            <span class="font-bold text-sm text-pink-800">A3</span>
            <span class="text-xs text-pink-600 text-center leading-tight mt-1"><?php echo e($universityBooths['A3']['name']); ?></span>
        </a>

        
        <a href="<?php echo e(route('universities.show', $universityBooths['C1']['slug'])); ?>"
           class="col-start-9 row-start-8 flex flex-col items-center justify-center p-2 bg-cyan-100 border border-cyan-300 rounded-md shadow-sm hover:shadow-lg hover:border-cyan-500 transition-all duration-200">
            <span class="font-bold text-sm text-cyan-800">C1</span>
            <span class="text-xs text-cyan-600 text-center leading-tight mt-1"><?php echo e($universityBooths['C1']['name']); ?></span>
        </a>

        
        <div class="col-start-4 col-span-3 row-start-9 bg-green-100 border-2 border-green-400 rounded-md flex items-center justify-center p-1 shadow-md">
            <div class="text-center text-green-800">
                <span class="font-bold text-sm">PINTU MASUK</span>
            </div>
        </div>
        <div class="col-start-10 col-span-3 row-start-9 bg-green-100 border-2 border-green-400 rounded-md flex items-center justify-center p-1 shadow-md">
            <div class="text-center text-green-800">
                <span class="font-bold text-sm">PINTU MASUK</span>
            </div>
        </div>

    </div>

    
    <div class="mt-6 bg-gray-50 rounded-lg p-4 border border-gray-200">
        <h4 class="text-sm font-semibold text-gray-800 mb-3">Keterangan Denah Expo:</h4>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-3 text-xs">
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-gray-800 rounded"></div>
                <span class="text-gray-600">Panggung Utama</span>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-blue-100 border border-blue-300 rounded"></div>
                <span class="text-gray-600">Blok B (PTN)</span>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-yellow-100 border border-yellow-300 rounded"></div>
                <span class="text-gray-600">Blok A (PTS)</span>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-purple-100 border border-purple-300 rounded"></div>
                <span class="text-gray-600">Blok C (Premium)</span>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-green-100 border-2 border-green-400 rounded"></div>
                <span class="text-gray-600">Pintu Masuk</span>
            </div>
            <div class="flex items-center space-x-2">
                <div class="w-3 h-3 bg-gray-100 border border-gray-300 rounded"></div>
                <span class="text-gray-600">Area Kosong</span>
            </div>
        </div>
        <div class="mt-3 text-xs text-gray-600 text-center">
            <span class="font-medium">💡 Tips:</span> Klik pada setiap booth untuk melihat detail universitas
        </div>
    </div>
</div>
<?php /**PATH D:\Coding\UDO\udo-platform\resources\views/components/expo-floor-plan.blade.php ENDPATH**/ ?>